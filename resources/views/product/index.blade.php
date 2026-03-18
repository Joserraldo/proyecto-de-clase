@extends('layout.app')

@section('title', 'Resultados de búsqueda')

@section('content')
<div class="bg-white border-b border-gray-200 py-2 px-6 text-sm text-gray-700 shadow-sm">
    <div class="max-w-[1500px] mx-auto flex justify-between items-center">
        <div>
            1-{{ count($misProductos) }} de {{ $misProductos->total() }} resultados para 
            <span class="text-orange-700 font-bold">
                "{{ request('search') ?? (request('category') ? \App\Models\Category::find(request('category'))->name : 'Todos los productos') }}"
            </span>
        </div>
        <div class="flex items-center gap-2">
            <span class="text-xs">Ordenar por:</span>
            <form action="{{ route('product.index') }}" method="GET" class="inline">
                @if(request('search'))<input type="hidden" name="search" value="{{ request('search') }}">@endif
                @if(request('category'))<input type="hidden" name="category" value="{{ request('category') }}">@endif
                @if(request('price_min'))<input type="hidden" name="price_min" value="{{ request('price_min') }}">@endif
                @if(request('price_max'))<input type="hidden" name="price_max" value="{{ request('price_max') }}">@endif
                
                <select name="sort" onchange="this.form.submit()" class="border border-gray-300 rounded-md py-1 px-4 text-xs bg-gray-50 focus:ring-0 focus:outline-none cursor-pointer hover:bg-gray-100 transition-colors">
                    <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Lo más nuevo</option>
                    <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Precio: de menor a mayor</option>
                    <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Precio: de mayor a menor</option>
                </select>
            </form>
        </div>
    </div>
</div>

<div class="max-w-[1500px] mx-auto flex px-4 mt-4 gap-6">
    <!-- Sidebar Filters -->
    <aside class="hidden lg:block w-64 flex-shrink-0 font-roboto">
        <div class="mb-6">
            <h3 class="font-bold text-sm mb-2">Categoría</h3>
            <ul class="text-sm space-y-1">
                <li>
                    <a href="{{ route('product.index', array_filter(['search' => request('search'), 'price_min' => request('price_min'), 'price_max' => request('price_max')])) }}" 
                       class="hover:text-amazon-orange {{ !request('category') ? 'font-bold text-amazon-orange' : 'text-gray-700' }}">
                        Ver Todo
                    </a>
                </li>
                @foreach(\App\Models\Category::all() as $cat)
                <li>
                    <a href="{{ route('product.index', array_filter(['category' => $cat->id, 'search' => request('search'), 'price_min' => request('price_min'), 'price_max' => request('price_max')])) }}" 
                       class="hover:text-amazon-orange {{ request('category') == $cat->id ? 'font-bold text-amazon-orange' : 'text-gray-700' }}">
                        {{ $cat->name }}
                    </a>
                </li>
                @endforeach
            </ul>
        </div>

        <div class="mb-6">
            <h3 class="font-bold text-sm mb-2">Opiniones de los clientes</h3>
            <div class="space-y-1">
                <div class="flex items-center gap-1 text-yellow-500 text-xs">
                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star text-gray-300"></i>
                    <span class="text-gray-700 ml-1">o más</span>
                </div>
                <div class="flex items-center gap-1 text-yellow-500 text-xs">
                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star text-gray-300"></i><i class="far fa-star text-gray-300"></i>
                    <span class="text-gray-700 ml-1">o más</span>
                </div>
            </div>
        </div>

        <div class="mb-6">
            <h3 class="font-bold text-sm mb-2">Precio</h3>
            @php
                $currentCategory = request('category');
                $currentSearch = request('search');
                $currentMin = request('price_min');
                $currentMax = request('price_max');
                $priceRanges = [
                    ['label' => 'Hasta $500', 'min' => null, 'max' => 500],
                    ['label' => '$500 a $1.000', 'min' => 500, 'max' => 1000],
                    ['label' => '$1.000 a $2.000', 'min' => 1000, 'max' => 2000],
                    ['label' => '$2.000 y más', 'min' => 2000, 'max' => null],
                ];
            @endphp
            <ul class="text-sm space-y-1">
                <li>
                    <a href="{{ route('product.index', array_filter(['category' => $currentCategory, 'search' => $currentSearch])) }}" 
                       class="hover:text-amazon-orange {{ !$currentMin && !$currentMax ? 'font-bold text-amazon-orange' : 'text-gray-700' }}">
                        Todos los precios
                    </a>
                </li>
                @foreach($priceRanges as $range)
                <li>
                    <a href="{{ route('product.index', array_filter(['category' => $currentCategory, 'search' => $currentSearch, 'price_min' => $range['min'], 'price_max' => $range['max']])) }}" 
                       class="hover:text-amazon-orange {{ $currentMin == $range['min'] && $currentMax == $range['max'] ? 'font-bold text-amazon-orange' : 'text-gray-700' }}">
                        {{ $range['label'] }}
                    </a>
                </li>
                @endforeach
            </ul>

            <!-- Custom Price Range -->
            <form action="{{ route('product.index') }}" method="GET" class="mt-3 flex items-center gap-1">
                @if($currentCategory)<input type="hidden" name="category" value="{{ $currentCategory }}">@endif
                @if($currentSearch)<input type="hidden" name="search" value="{{ $currentSearch }}">@endif
                <input type="number" name="price_min" placeholder="Min" value="{{ $currentMin }}" class="w-16 border border-gray-300 rounded px-2 py-1 text-xs focus:ring-1 focus:ring-yellow-500 focus:outline-none">
                <span class="text-gray-400 text-xs">-</span>
                <input type="number" name="price_max" placeholder="Max" value="{{ $currentMax }}" class="w-16 border border-gray-300 rounded px-2 py-1 text-xs focus:ring-1 focus:ring-yellow-500 focus:outline-none">
                <button type="submit" class="bg-amazon-button hover:bg-yellow-400 px-2 py-1 rounded text-xs font-bold transition-all">
                    Ir
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Listing Grid -->
    <div class="flex-grow">
        @if($misProductos->count() > 0)
        <!-- Result count & Header -->
        <div class="mb-6 flex flex-col md:flex-row justify-between items-start md:items-center gap-4 border-b border-gray-100 pb-4">
            <h1 class="text-xl font-bold text-gray-900">Resultados de búsqueda</h1>
            <div class="text-sm text-gray-500 font-medium bg-gray-50 px-3 py-1 rounded-full border border-gray-100">
                Mostrando <span class="text-amazon-navy font-bold">{{ $misProductos->firstItem() }}-{{ $misProductos->lastItem() }}</span> de {{ $misProductos->total() }} productos
            </div>
        </div>

        <!-- GALLERY GRID: Robust distribution -->
        <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-4 gap-4 md:gap-8">
            @foreach($misProductos as $product)
            <div class="bg-white border border-gray-100 group flex flex-col relative rounded-xl overflow-hidden shadow-sm hover:shadow-2xl hover:border-amazon-orange transition-all duration-300">
                <!-- Product Image Gallery Style -->
                <div class="aspect-square flex items-center justify-center bg-white p-4 relative overflow-hidden">
                    <a href="{{ route('product.show', $product) }}" class="w-full h-full flex items-center justify-center">
                        <img src="{{ $product->image ? asset('storage/' . $product->image) : 'https://cdn-icons-png.flaticon.com/512/428/428001.png' }}" 
                             style="max-width: 90%; max-height: 90%; object-fit: contain;"
                             class="transform group-hover:scale-110 transition-transform duration-700 ease-out" 
                             alt="{{ $product->name }}"
                             onerror="this.src='https://cdn-icons-png.flaticon.com/512/428/428001.png'">
                    </a>
                    
                    <!-- Quick action badge for demo -->
                    <div class="absolute top-3 left-3 bg-white/90 backdrop-blur-sm px-2 py-1 rounded text-[10px] font-black uppercase text-amazon-navy border border-gray-100 shadow-sm opacity-0 group-hover:opacity-100 transition-opacity">
                        Visto rápido
                    </div>
                </div>

                <!-- Product Details -->
                <div class="p-4 md:p-6 flex flex-col flex-grow bg-white border-t border-gray-50">
                    <a href="{{ route('product.show', $product) }}" class="text-sm md:text-base font-bold text-gray-900 line-clamp-2 hover:text-amazon-orange transition-colors mb-2 leading-tight">
                        {{ $product->name }}
                    </a>

                    <!-- Rating Stars -->
                    <div class="flex items-center gap-1 text-yellow-500 text-[10px] md:text-xs mb-3">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt text-gray-200"></i>
                        <span class="text-amazon-blue font-medium ml-1">4.5</span>
                    </div>

                    <!-- Price & Shipping -->
                    <div class="mt-auto">
                        <div class="flex items-start text-gray-900">
                            <span class="text-xs md:text-sm mt-1 font-bold italic">$</span>
                            <span class="text-2xl md:text-3xl font-black tracking-tight">{{ number_format($product->price, 0, ',', '.') }}</span>
                            <span class="text-xs md:text-sm mt-1 font-bold italic">.00</span>
                        </div>
                        
                        <div class="flex flex-wrap items-center gap-2 mt-3">
                            <span class="bg-amazon-orange text-[9px] font-black px-2 py-0.5 rounded shadow-sm italic uppercase">UNAB Prime</span>
                            <p class="text-[10px] text-gray-500 font-medium">Llega <span class="text-green-600 font-bold">mañana</span></p>
                        </div>

                        <!-- Add to Cart Fast Button -->
                        <form action="{{ route('cart.add') }}" method="POST" class="mt-4">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <button type="submit" class="w-full bg-amazon-button hover:bg-yellow-400 py-1.5 rounded-full text-xs font-bold transition-all shadow-sm active:scale-95">
                                Añadir al carrito
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Admin Delete button -->
                @auth
                <div class="absolute top-3 right-3 opacity-0 group-hover:opacity-100 transition-all transform translate-y-2 group-hover:translate-y-0">
                    <form action="{{ route('product.destroy', $product) }}" method="POST" onsubmit="return confirm('¿Eliminar producto?')">
                        @method('DELETE')
                        @csrf    
                        <button type="submit" class="bg-white/90 backdrop-blur-md p-2.5 rounded-full shadow-xl text-red-500 hover:bg-red-500 hover:text-white transition-all border border-gray-100">
                            <i class="fas fa-trash-can text-sm"></i>
                        </button>
                    </form>
                </div>
                @endauth
            </div>
            @endforeach
        </div>

        <!-- PAGINATION: Centered and Styled -->
        <div class="mt-20 mb-16 flex justify-center">
            <div class="bg-white px-6 py-4 rounded-2xl shadow-lg border border-gray-100 amazon-pagination">
                {{ $misProductos->links() }}
            </div>
        </div>
        @else
        <div class="text-center py-40">
            <div class="w-24 h-24 bg-white shadow-xl rounded-full flex items-center justify-center mx-auto mb-8 animate-pulse border border-gray-100">
                <i class="fas fa-box-open text-4xl text-gray-200"></i>
            </div>
            <h2 class="text-3xl font-black text-gray-900 mb-3">Tu búsqueda está vacía</h2>
            <p class="text-gray-500 max-w-sm mx-auto italic text-lg">No encontramos productos en esta categoría por ahora.</p>
            <a href="{{ route('product.index') }}" class="mt-8 inline-block bg-amazon-button text-amazon-dark px-10 py-3 rounded-full font-bold hover:shadow-2xl transition-all">Ver Todo el Catálogo</a>
        </div>
        @endif
    </div>
</div>

<style>
    .amazon-pagination nav { display: flex; gap: 0.5rem; justify-content: center; }
    .amazon-pagination nav div:first-child { display: none; }
    .amazon-pagination a, .amazon-pagination span {
        border-radius: 9999px !important;
        width: 45px !important;
        height: 45px !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        border: 1px solid #e5e7eb !important;
        transition: all 0.3s ease;
        font-weight: 600;
        text-decoration: none !important;
    }
    .amazon-pagination span[aria-current="page"] > span {
        background-color: #232f3e !important;
        color: white !important;
        border-color: #232f3e !important;
    }
    .amazon-pagination a:hover {
        background-color: #ffd814 !important;
        border-color: #ffd814 !important;
        color: #131921 !important;
        transform: scale(1.1);
    }
</style>
@endsection