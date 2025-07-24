<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Product Image -->
                        <div>
                            @if($product->image)
                                <img src="https://images.unsplash.com/photo-1592750475338-74b7b21085ab?w=100&h=100&fit=crop"
                                     alt="{{ $product->name }}" 
                                     class="w-full rounded-lg shadow-md">
                            @endif
                        </div>
                        
                        <!-- Product Details -->
                        <div>
                            <h1 class="text-3xl font-bold mb-4">{{ $product->name }}</h1>
                            <p class="text-gray-600 mb-6">{{ $product->description }}</p>
                            <div class="mb-6">
                                <span class="text-2xl font-bold">
                                    Rp {{ number_format($product->price, 0, ',', '.') }}
                                </span>
                            </div>

                            <!-- Add to Cart Form -->
                            <form action="{{ route('cart.add', $product) }}" method="POST" class="mb-6">
                                @csrf
                                <div class="flex items-center gap-4">
                                    <div class="w-24">
                                        <label for="quantity" class="block text-sm font-medium text-gray-700 mb-1">Quantity</label>
                                        <input type="number" 
                                               name="quantity" 
                                               id="quantity" 
                                               value="1" 
                                               min="1" 
                                               class="w-full rounded border-gray-300">
                                    </div>
                                    <button type="submit" 
                                            class="bg-blue text-black px-6 py-2 rounded hover:bg-blue-600">
                                        Add to Cart
                                    </button>
                                </div>
                            </form>
                            
                            <!-- Back Button -->
                            <div class="mt-6">
                                <a href="{{ route('products.index') }}" 
                                   class="inline-block bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                                    Back to Products
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>