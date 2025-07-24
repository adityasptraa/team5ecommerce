<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-bold mb-6">Shopping Cart</h1>
                    @if($cartItems->count() > 0)
                        <div class="space-y-6">
                            @foreach($cartItems as $item)
                                <div class="flex items-center justify-between border-b pb-4">
                                    <div class="flex items-center space-x-4">
                                        @if($item->product->image)
                                            <img src="{{ asset('storage/' . $item->product->image) }}" 
                                                 alt="{{ $item->product->name }}" 
                                                 class="w-24 h-24 object-cover rounded-md">
                                        @endif
                                        <div>
                                            <h3 class="text-lg font-semibold">{{ $item->product->name }}</h3>
                                            <p class="text-gray-600">${{ number_format($item->product->price, 2) }}</p>
                                            <p class="text-sm text-gray-500">Quantity: {{ $item->quantity }}</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center space-x-4">
                                        <span class="text-lg font-bold">
                                            ${{ number_format($item->product->price * $item->quantity, 2) }}
                                        </span>
                                        <form action="{{ route('cart.remove', $item) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700">
                                                Remove
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                            <div class="flex justify-between items-center pt-4">
                                <span class="text-xl font-bold">Total:</span>
                                <span class="text-xl font-bold">
                                    ${{ number_format($cartItems->sum(function($item) { 
                                        return $item->product->price * $item->quantity; 
                                    }), 2) }}
                                </span>
                            </div>
                        </div>
                    @else
                        <p class="text-gray-600">Your cart is empty.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
