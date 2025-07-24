<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-bold mb-6">Products</h1>
                    
                    {{-- Debug --}}
                    @if($products->isEmpty())
                        <p>No products found</p>
                    @else
                        <p>Found {{ $products->count() }} products</p>
                    @endif

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        @foreach ($products as $product)
                            <div class="border rounded-lg p-4 shadow hover:shadow-md transition">
                                @if($product->image)
                                    <img src="https://images.unsplash.com/photo-1592750475338-74b7b21085ab?w=100&h=100&fit=crop" alt="{{ $product->name }}" class="w-full h-48 object-cover rounded-t-lg">
                                @endif
                                <div class="p-4">
                                    <h2 class="text-xl font-semibold">{{ $product->name }}</h2>
                                    <p class="text-gray-600 mt-2">{{ $product->description }}</p>
                                    <div class="mt-4 flex justify-between items-center">
                                        <p class="text-lg font-bold text-gray-900">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                                        <a href="{{ route('products.show', $product) }}" class="text-black px-4 py-2 rounded hover:bg-blue-600">
                                            View Details
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>