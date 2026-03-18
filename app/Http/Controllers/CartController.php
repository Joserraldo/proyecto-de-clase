<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cart = $this->getCartData();
        
        $total = array_reduce($cart, function($carry, $item) {
            return $carry + ($item['price'] * $item['quantity']);
        }, 0);
        
        $featuredProducts = Product::latest()->take(2)->get();

        return view('cart.index', compact('cart', 'total', 'featuredProducts'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id'
        ]);

        $product = Product::findOrFail($request->product_id);
        $cart = $this->getCartData();

        if(isset($cart[$product->id])) {
            $cart[$product->id]['quantity']++;
        } else {
            $cart[$product->id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image
            ];
        }

        $this->saveCartData($cart);
        
        if ($request->has('redirect') && $request->redirect === 'checkout') {
            return redirect()->route('cart.index'); // Go to cart first to see summary before checkout
        }

        return redirect()->back()->with('success', 'Producto añadido al carrito!');
    }

    public function remove(Request $request)
    {
        if($request->id) {
            $cart = $this->getCartData();
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                $this->saveCartData($cart);
            }
            return redirect()->back()->with('success', 'Producto eliminado!');
        }
    }

    public function checkout()
    {
        $cart = $this->getCartData();
        if(count($cart) == 0) return redirect()->route('product.index');
        
        if (Auth::check()) {
            CartItem::where('user_id', Auth::id())->delete();
        }
        session()->forget('cart');
        
        return view('cart.checkout_success');
    }

    /**
     * Helper to get cart data from DB (if auth) or Session
     */
    private function getCartData()
    {
        if (Auth::check()) {
            $items = CartItem::where('user_id', Auth::id())->with('product')->get();
            $cart = [];
            foreach ($items as $item) {
                if ($item->product) {
                    $cart[$item->product_id] = [
                        "name" => $item->product->name,
                        "quantity" => $item->quantity,
                        "price" => $item->product->price,
                        "image" => $item->product->image
                    ];
                }
            }
            return $cart;
        }

        return session()->get('cart', []);
    }

    /**
     * Helper to save cart data to DB (if auth) or Session
     */
    private function saveCartData($cart)
    {
        if (Auth::check()) {
            // Very simple sync for MVP: delete all and recreate
            CartItem::where('user_id', Auth::id())->delete();
            foreach ($cart as $productId => $details) {
                CartItem::create([
                    'user_id' => Auth::id(),
                    'product_id' => $productId,
                    'quantity' => $details['quantity']
                ]);
            }
        }
        
        // Always save to session as well for cross-compatibility
        session()->put('cart', $cart);
    }
}
