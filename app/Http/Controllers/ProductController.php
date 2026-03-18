<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\StoreProductRequest;

class ProductController extends Controller
{
    public function index(\Illuminate\Http\Request $request)
    {
        $query = Product::with('category');

        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->has('category')) {
            $query->where('category_id', $request->category);
        }

        if ($request->filled('price_min')) {
            $query->where('price', '>=', $request->price_min);
        }

        if ($request->filled('price_max')) {
            $query->where('price', '<=', $request->price_max);
        }

        switch ($request->query('sort')) {
            case 'price_asc':
                $query->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('price', 'desc');
                break;
            case 'newest':
            default:
                $query->latest();
                break;
        }
        $ProductList = $query->paginate(9);

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
