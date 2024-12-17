<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists|product,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $cart = Cart::updateOrCreate(
            ['user_id' => Auth::id(), 'product_id'=> $request->product_id],
            ['quantity' => $request->quantity]
        );

        return response()->json([
            'message' => 'Product added to cart successfully',
            'cart' => '$cart'
        ], 201);
    
    }
    public function viewCart()
    {
        $cartItems = Cart::with('product')->where('user_id', Auth::id())->get();
        
        return response()->json([
            'cart_items' => $cartItems
        ], 200);
    }

    public function removeFromCart($id)
    {
        $cartItem = Cart::where('id',$id)->where('user_id', Auth::id())->first();

        if(!$cartItem){
            return response()->json(['message' => 'Item not found'], 404);
        }

        $cartItem->delete();

        return response()->json(['message' => 'Item removed from cart successfully']);
    }
}
