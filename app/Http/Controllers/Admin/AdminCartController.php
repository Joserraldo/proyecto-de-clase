<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use App\Models\User;
use Illuminate\Http\Request;

class AdminCartController extends Controller
{
    /**
     * Display a listing of all active carts group by user.
     */
    public function index()
    {
        // Agrupamos los items del carrito por usuario para ver los "carritos" individuales
        $carts = User::has('cartItems')->with(['cartItems' => function($query) {
            $query->with('product');
        }])->get();

        return view('admin.carts.index', compact('carts'));
    }

    /**
     * Display the specified cart.
     */
    public function show(User $user)
    {
        $user->load('cartItems.product');
        $total = $user->cartItems->sum(function($item) {
            return $item->product->price * $item->quantity;
        });

        return view('admin.carts.show', compact('user', 'total'));
    }
    
    /**
     * Remove the specified item from cart (optional admin action).
     */
    public function destroyItem(CartItem $cartItem)
    {
        $cartItem->delete();
        return redirect()->back()->with('success', 'Item eliminado del carrito.');
    }
}
