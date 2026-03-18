<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;

// PAGINA DE INICIO
Route::get('/', HomeController::class)->name('home');

// RUTAS DE PRODUCTOS
Route::prefix('product')->controller(ProductController::class)->group(function(){
    Route::get('/', 'index')->name('product.index');   
    Route::get('/create', 'create')->name('product.create');
    Route::get('/{product}', 'show')->name('product.show');
    Route::post('/store', 'store')->name('product.store');
    Route::delete('/{product}', 'destroy')->name('product.destroy');
});

// CARRITO DE COMPRAS
Route::prefix('cart')->controller(CartController::class)->group(function() {
    Route::get('/', 'index')->name('cart.index');
    Route::post('/add', 'add')->name('cart.add');
    Route::post('/remove', 'remove')->name('cart.remove');
    Route::get('/checkout', 'checkout')->name('cart.checkout');
});

// DASHBOARD Y PERFIL (BREEZE)
Route::get('/dashboard', function () {
    $stats = [
        'categories' => \App\Models\Category::count(),
        'products' => \App\Models\Product::count(),
        'active_carts' => \App\Models\User::has('cartItems')->count(),
    ];
    return view('dashboard', compact('stats'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// PANEL DE ADMINISTRACION (CATEGORIAS)
Route::middleware(['auth', 'verified'])->prefix('admin')->group(function () {
    Route::resource('categories', CategoryController::class)->names([
        'index' => 'admin.categories.index',
        'create' => 'admin.categories.create',
        'store' => 'admin.categories.store',
        'edit' => 'admin.categories.edit',
        'update' => 'admin.categories.update',
        'destroy' => 'admin.categories.destroy',
    ]);
    // Ver carritos de usuarios
    Route::get('/carts', [\App\Http\Controllers\Admin\AdminCartController::class, 'index'])->name('admin.carts.index');
    Route::get('/carts/{user}', [\App\Http\Controllers\Admin\AdminCartController::class, 'show'])->name('admin.carts.show');
    Route::delete('/carts/item/{cartItem}', [\App\Http\Controllers\Admin\AdminCartController::class, 'destroyItem'])->name('admin.carts.destroyItem');
    Route::post('/carts/{user}/notify', [\App\Http\Controllers\Admin\AdminCartController::class, 'notifyPromo'])->name('admin.carts.notify');
});

// API para consultar promociones en tiempo real
Route::get('/api/check-promo', function() {
    if (!\Illuminate\Support\Facades\Auth::check()) {
        return response()->json(['hasPromo' => false]);
    }
    
    $hasPromo = \Illuminate\Support\Facades\Cache::has('cart_promo_' . \Illuminate\Support\Facades\Auth::id());
    if ($hasPromo) {
        // La borramos para que solo aparezca una vez
        \Illuminate\Support\Facades\Cache::forget('cart_promo_' . \Illuminate\Support\Facades\Auth::id());
        return response()->json(['hasPromo' => true, 'message' => '¡OFERTA RELÁMPAGO! Completa tu compra en la próxima hora y no te arrepentirás.']);
    }
    
    return response()->json(['hasPromo' => false]);
})->name('api.check-promo');

require __DIR__.'/auth.php';
