<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

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

    /**
     * Send a promo notification to the specific user's cart
     */
    public function notifyPromo(User $user)
    {
        // Set a cache key that expires in 10 minutes
        Cache::put('cart_promo_' . $user->id, true, now()->addMinutes(10));
        
        return redirect()->back()->with('success', '¡Notificación de oferta relámpago enviada a ' . $user->name . '!');
    }
}
