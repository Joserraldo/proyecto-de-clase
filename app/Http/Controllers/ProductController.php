<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\StoreProductRequest;

class ProductController extends Controller
{
    public function index()
    {
        $ProductList = Product::with('category')->latest()->take(20)->get();

        return view('product.index', ['misProductos' => $ProductList]);
    }

    public function create()
    {
        $categoryList = Category::all();

        return view('product.create', ['categories' => $categoryList]);
    }

    public function show(Product $product)
    {
        return view('product.show', compact('product'));
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index');
    }

    public function store(StoreProductRequest $request)
    {
        $validated = $request->validated();

        $product = new Product();
        $product->name = $validated['nombre'];
        $product->description = $validated['descripcion'];
        $product->price = $validated['precio'];
        $product->category_id = $validated['categoria'];

        if ($request->hasFile('imagen')) {
            $ruta = $request->file('imagen')->store('images', 'public');
            $product->image = $ruta;
        }

        $product->save();

        return redirect()->route('product.index')->with('success', 'Producto creado con éxito.');
    }
}
