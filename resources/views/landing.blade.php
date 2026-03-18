@extends('layout.app')

@section('title', 'Explora UNAB Shop')

@section('content')
<div class="bg-slate-50 min-h-screen font-roboto">
    <!-- HERO SECTION: Dominant entry point -->
    <header class="relative h-[650px] w-full flex items-center justify-center text-white overflow-hidden bg-amazon-navy">
        <!-- Custom Tech Background via UI Code -->
        <div class="absolute inset-0 z-0">
            <!-- Grid pattern -->
            <div class="absolute inset-0" style="background-image: radial-gradient(#4b5563 1px, transparent 1px); background-size: 40px 40px; opacity: 0.2;"></div>
            
            <!-- Glowing accents -->
            <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-amazon-orange rounded-full mix-blend-screen filter blur-[120px] opacity-20 animate-pulse"></div>
            <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-blue-500 rounded-full mix-blend-screen filter blur-[120px] opacity-20 animate-pulse" style="animation-delay: 2s;"></div>
            
            <!-- Floating Tech Icons -->
            <div class="absolute top-[15%] left-[10%] text-gray-600 opacity-30 transform -rotate-12"><i class="fas fa-microchip text-6xl"></i></div>
            <div class="absolute top-[20%] right-[15%] text-gray-600 opacity-30 transform rotate-12"><i class="fas fa-server text-8xl"></i></div>
            <div class="absolute bottom-[20%] left-[20%] text-gray-600 opacity-30 transform rotate-45"><i class="fas fa-wifi text-5xl"></i></div>
            <div class="absolute bottom-[30%] right-[10%] text-gray-600 opacity-30 transform -rotate-45"><i class="fas fa-laptop-code text-7xl"></i></div>
            <div class="absolute top-[40%] left-[5%] text-gray-600 opacity-20 transform rotate-90"><i class="fas fa-database text-6xl"></i></div>
            <div class="absolute top-[60%] right-[5%] text-gray-600 opacity-20 transform -rotate-12"><i class="fas fa-network-wired text-5xl"></i></div>
            
            <!-- Shadow Overlay -->
            <div class="absolute inset-0 bg-gradient-to-t from-amazon-navy via-amazon-navy/80 to-transparent"></div>
        </div>
        
        <div class="absolute z-10 text-center px-4 animate-fade-in-up">
            <h1 class="text-6xl md:text-8xl font-black mb-6 tracking-tighter drop-shadow-2xl">
                TECNOLOGÍA <span class="text-amazon-orange">UNAB</span>
            </h1>
            <p class="text-xl md:text-2xl mb-10 max-w-2xl mx-auto font-light text-slate-200 drop-shadow">
                Tu próximo proyecto empieza aquí. Encuentra herramientas de grado profesional para ingeniería y diseño.
            </p>
            <div class="flex flex-col sm:flex-row justify-center gap-6">
                <a href="{{ route('product.index') }}" 
                   class="bg-amazon-button text-amazon-dark px-14 py-5 rounded-full text-xl font-bold shadow-2xl hover:bg-yellow-400 transform hover:scale-110 transition-all">
                    Ver Todos los Productos
                </a>
                @guest
                <a href="{{ route('register') }}" 
                   class="bg-white/10 backdrop-blur-md border border-white/30 px-14 py-5 rounded-full text-xl font-bold hover:bg-white hover:text-amazon-dark transition-all">
                    Únete a la Comunidad
                </a>
                @endguest
            </div>
        </div>
    </header>

    <!-- TRUST BADGES -->
    <div class="max-w-[1500px] mx-auto px-6 -mt-10 relative z-20 grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-2xl shadow-xl flex items-center gap-4 border border-slate-100">
            <div class="bg-emerald-100 p-4 rounded-xl text-emerald-600 text-2xl"><i class="fas fa-check-double"></i></div>
            <div><h4 class="font-bold">Calidad Certificada</h4><p class="text-xs text-slate-500">Probado por expertos UNAB</p></div>
        </div>
        <div class="bg-white p-6 rounded-2xl shadow-xl flex items-center gap-4 border border-slate-100">
            <div class="bg-amber-100 p-4 rounded-xl text-amber-600 text-2xl"><i class="fas fa-shipping-fast"></i></div>
            <div><h4 class="font-bold">Entrega Inmediata</h4><p class="text-xs text-slate-500">Recibe hoy mismo en campus</p></div>
        </div>
        <div class="bg-white p-6 rounded-2xl shadow-xl flex items-center gap-4 border border-slate-100">
            <div class="bg-sky-100 p-4 rounded-xl text-sky-600 text-2xl"><i class="fas fa-headset"></i></div>
            <div><h4 class="font-bold">Soporte 24/7</h4><p class="text-xs text-slate-500">Ayuda técnica especializada</p></div>
        </div>
    </div>

    <!-- CATEGORIES SECTION -->
    <main class="max-w-[1500px] mx-auto px-6 py-24">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-slate-900 mb-4 tracking-tight">Explora por Categoría</h2>
            <div class="w-24 h-1.5 bg-amazon-orange mx-auto rounded-full"></div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @php $placeholder = "https://cdn-icons-png.flaticon.com/512/428/428001.png"; @endphp
            @foreach($categories->take(4) as $category)
            <div class="bg-white group rounded-3xl overflow-hidden shadow-sm hover:shadow-2xl transition-all duration-500 border border-slate-100">
                <div class="p-8 pb-4">
                    <h3 class="text-2xl font-bold text-slate-800 group-hover:text-amazon-orange transition-colors">{{ $category->name }}</h3>
                </div>
                <!-- Fixed proportions for images -->
                <div class="h-64 flex items-center justify-center p-6 bg-slate-50/50 m-4 rounded-2xl overflow-hidden">
                    @php
                        // Robust null check for relationship
                        $catProduct = $category->products ? $category->products->first() : null;
                        $imagePath = $catProduct && $catProduct->image ? asset('storage/' . $catProduct->image) : $placeholder;
                    @endphp
                    <img src="{{ $imagePath }}" 
                         style="width: 200px; height: 200px; object-fit: contain;"
                         width="200" height="200"
                         class="transform group-hover:scale-110 transition-transform duration-700" 
                         alt="{{ $category->name }}"
                         onerror="this.src='{{ $placeholder }}'">
                </div>
                <div class="p-8 pt-0">
                    <a href="{{ route('product.index', ['category' => $category->id]) }}" 
                       class="text-amazon-blue font-bold text-sm flex items-center gap-2 hover:gap-4 transition-all group-hover:text-amazon-orange">
                        Ver Selección <i class="fas fa-chevron-right text-[10px]"></i>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    <!-- FEATURED PRODUCTS GALLERY -->
    <section class="bg-white py-24">
        <div class="max-w-[1500px] mx-auto px-6">
            <div class="flex justify-between items-end mb-12">
                <div>
                    <h2 class="text-4xl font-black text-slate-900 mb-2 tracking-tight">Lo más destacado</h2>
                    <p class="text-slate-500 font-medium">Selección premium de equipos recién llegados</p>
                </div>
                <a href="{{ route('product.index') }}" class="text-amazon-blue font-bold hover:text-amazon-orange transition-all flex items-center gap-2 group text-lg">
                    Ver catálogo completo <i class="fas fa-chevron-right text-xs group-hover:translate-x-1 transition-transform"></i>
                </a>
            </div>

            <div class="grid grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                @foreach($featuredProducts->take(8) as $product)
                <div class="group flex flex-col relative bg-slate-50/50 rounded-3xl overflow-hidden border border-slate-100 hover:bg-white hover:shadow-2xl hover:border-amazon-orange transition-all duration-500">
                    <div class="aspect-square flex items-center justify-center p-8 relative overflow-hidden">
                        <a href="{{ route('product.show', $product) }}" class="w-full h-full flex items-center justify-center">
                            <img src="{{ $product->image ? asset('storage/' . $product->image) : $placeholder }}" 
                                 style="max-width: 85%; max-height: 85%; object-fit: contain;"
                                 class="transform group-hover:scale-110 transition-transform duration-700 ease-out" 
                                 alt="{{ $product->name }}"
                                 onerror="this.src='{{ $placeholder }}'">
                        </a>
                        <div class="absolute top-4 left-4 bg-amazon-navy text-white text-[10px] font-black px-3 py-1 rounded-full uppercase tracking-widest shadow-lg">New</div>
                    </div>

                    <div class="p-8 pt-0 flex flex-col flex-grow">
                        <a href="{{ route('product.show', $product) }}" class="text-lg font-bold text-slate-900 hover:text-amazon-orange transition-colors mb-4 line-clamp-2 leading-tight">
                            {{ $product->name }}
                        </a>
                        
                        <div class="flex items-center gap-1 text-yellow-400 text-xs mb-4">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                            <span class="text-slate-400 font-bold ml-2">5.0</span>
                        </div>

                        <div class="mt-auto flex items-center justify-between">
                            <div class="flex items-start text-slate-900">
                                <span class="text-sm mt-1 font-black">$</span>
                                <span class="text-3xl font-black tracking-tighter">{{ number_format($product->price, 0, ',', '.') }}</span>
                            </div>
                            <form action="{{ route('cart.add') }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <button type="submit" class="bg-amazon-navy text-white p-3 rounded-2xl hover:bg-amazon-orange hover:text-amazon-navy transition-all shadow-lg active:scale-95">
                                    <i class="fas fa-cart-plus"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- CALL TO ACTION BANNER -->
    <section class="py-24 bg-slate-50 flex items-center justify-center px-6">
        <div class="max-w-[1500px] w-full bg-amazon-navy rounded-[40px] p-12 md:p-24 relative overflow-hidden shadow-2xl">
            <div class="absolute top-0 right-0 w-1/3 h-full opacity-10 pointer-events-none">
                <i class="fas fa-microchip text-[400px] -rotate-12 translate-x-20 -translate-y-20"></i>
            </div>
            
            <div class="relative z-10 max-w-2xl">
                <h2 class="text-4xl md:text-6xl font-black text-white mb-8 leading-tight italic">
                    ¿Eres estudiante UNAB? <br>
                    <span class="text-amazon-orange not-italic">Descuentos exclusivos</span>
                </h2>
                <p class="text-xl text-slate-300 mb-10 leading-relaxed">
                    Regístrate con tu correo institucional y accede a precios especiales en laboratorios, memorias y periféricos seleccionados.
                </p>
                <div class="flex flex-wrap gap-6">
                    <a href="{{ route('register') }}" class="bg-amazon-button text-amazon-dark px-12 py-5 rounded-full text-xl font-bold hover:shadow-2xl transition-all">Crear Mi Cuenta Gratis</a>
                    <a href="{{ route('product.index') }}" class="bg-white/10 text-white border border-white/20 px-12 py-5 rounded-full text-xl font-bold hover:bg-white/20 transition-all">Explorar Bazar</a>
                </div>
            </div>
        </div>
    </section>
</div>

<style>
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(40px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in-up {
        animation: fadeInUp 1.2s cubic-bezier(0.16, 1, 0.3, 1) forwards;
    }
    html { scroll-behavior: smooth; }
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>
@endsection


