<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::where('user_id', auth()->id())->with('product')->get();
        return view('cart.index', compact('cartItems'));
    }

    public function add(Request $request, Product $product)
    {
        $request->validate([
            'quantity' => 'required|numeric|min:1'
        ]);

        $cart = Cart::updateOrCreate(
            [
                'user_id' => auth()-> id(),
                'product_id' => $product->id
            ],
            [
                'quantity' => $request->quantity
            ]
        );

        return redirect()->route('cart.index')->with('success', 'Product added to cart!');
    }

    public function remove(Cart $cart)
    {
        $cart->delete();
        return redirect()->route('cart.index')->with('success', 'Product removed from cart!');
    }
}
