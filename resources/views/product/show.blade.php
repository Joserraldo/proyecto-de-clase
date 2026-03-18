@extends('layout.app')

@section('title', 'Detalle: ' . $product->name)

@section('content')
<div class="bg-white min-h-screen pt-4 pb-20">
    <div class="max-w-[1500px] mx-auto px-6">
        <!-- Breadcrumbs -->
        <nav class="flex items-center gap-2 text-xs text-gray-500 mb-6 font-roboto">
            <a href="{{ route('product.index') }}" class="hover:text-orange-700 hover:underline">Electrónicos</a>
            <i class="fas fa-chevron-right text-[8px]"></i>
            <a href="#" class="hover:text-orange-700 hover:underline">{{ $product->category->name ?? 'Tecnología' }}</a>
            <i class="fas fa-chevron-right text-[8px]"></i>
            <span class="text-gray-900 truncate">{{ $product->name }}</span>
        </nav>

        <div class="flex flex-col lg:flex-row gap-8 items-start">
            <!-- Col 1: Product Image (Sticky) -->
            <div class="w-full lg:w-[35%] flex-shrink-0">
                <div class="sticky top-28 flex flex-col items-center">
                    <div class="w-full aspect-square border border-gray-100 p-10 rounded-xl bg-white flex items-center justify-center overflow-hidden shadow-sm hover:shadow-md transition-shadow">
                        <img src="{{ $product->image ? asset('storage/' . $product->image) : 'https://cdn-icons-png.flaticon.com/512/428/428001.png' }}" 
                             class="max-w-full max-h-full object-contain cursor-zoom-in hover:scale-110 transition-transform duration-700" 
                             alt="{{ $product->name }}"
                             onerror="this.src='https://cdn-icons-png.flaticon.com/512/428/428001.png'">
                    </div>
                    <div class="w-full mt-6 grid grid-cols-4 gap-2">
                        @for($i=0; $i<4; $i++)
                        <div class="aspect-square border border-gray-200 rounded p-1 cursor-pointer hover:border-amazon-orange transition-colors bg-white">
                            <img src="{{ $product->image ? asset('storage/' . $product->image) : 'https://cdn-icons-png.flaticon.com/512/428/428001.png' }}" class="w-full h-full object-contain opacity-50 hover:opacity-100">
                        </div>
                        @endfor
                    </div>
                </div>
            </div>

            <!-- Col 2: Product Info & Description -->
            <div class="flex-grow font-roboto space-y-4">
                <div class="border-b border-gray-100 pb-4">
                    <h1 class="text-3xl font-medium text-gray-900 leading-tight mb-2">{{ $product->name }}</h1>
                    <div class="flex items-center gap-4 text-sm">
                        <a href="#" class="text-amazon-blue hover:text-orange-700 hover:underline">Visita la marca UNAB Tech</a>
                        <div class="flex items-center gap-1 text-yellow-500">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
                            <span class="text-amazon-blue ml-2 hover:text-orange-700 underline underline-offset-2">1,542 calificaciones</span>
                        </div>
                    </div>
                </div>

                <!-- Featured Price for Info Column -->
                <div class="py-2">
                    <div class="flex items-start gap-2">
                        <span class="text-red-600 text-3xl font-light">-15%</span>
                        <div class="flex items-start text-gray-900">
                            <span class="text-sm mt-1 font-bold">$</span>
                            <span class="text-4xl font-medium tracking-tighter">{{ number_format($product->price, 0, ',', '.') }}</span>
                            <span class="text-sm mt-1 font-bold">99</span>
                        </div>
                    </div>
                    <p class="text-xs text-gray-500 mt-1">Precio recomendado: <span class="line-through">${{ number_format($product->price * 1.15, 0, ',', '.') }}</span></p>
                </div>

                <div class="h-[1px] bg-gray-100"></div>

                <!-- Product Details -->
                <div class="space-y-4">
                    <h3 class="font-bold text-sm text-gray-900">Acerca de este artículo</h3>
                    <ul class="text-sm space-y-3 list-disc pl-5 text-gray-700 leading-relaxed">
                        <li><span class="font-bold">Diseño Industrial:</span> Estética minimalista que encaja en cualquier entorno profesional.</li>
                        <li><span class="font-bold">Rendimiento UNAB:</span> Optimizado específicamente para flujos de trabajo de ingeniería.</li>
                        <li><span class="font-bold">Sostenibilidad:</span> Empaque 100% reciclable con materiales de origen local.</li>
                        <li class="italic text-amazon-navy font-medium">{{ $product->description }}</li>
                    </ul>
                </div>
                
                <div class="bg-gray-50 border border-gray-100 rounded-lg p-4 flex items-center gap-4">
                    <i class="fas fa-shield-halved text-amazon-blue text-xl"></i>
                    <div class="text-xs">
                        <p class="font-bold text-gray-900">Respaldo Amazon UNAB</p>
                        <p class="text-gray-500">Garantía extendida de 2 años incluida con Prime.</p>
                    </div>
                </div>
            </div>

            <!-- Col 3: Buy Box (Desktop Only Sticky) -->
            <div class="w-full lg:w-[280px] xl:w-[320px] flex-shrink-0">
                <div class="border border-gray-300 rounded-xl p-5 sticky top-28 bg-white shadow-sm font-roboto">
                    <div class="flex items-start text-gray-900 mb-2">
                        <span class="text-xs mt-1 font-bold">$</span>
                        <span class="text-3xl font-medium">{{ number_format($product->price, 0, ',', '.') }}</span>
                        <span class="text-sm mt-1 font-bold">99</span>
                    </div>
                    
                    <div class="space-y-3 mb-6">
                        <p class="text-sm text-amazon-blue font-medium">Entrega GRATIS</p>
                        <p class="text-xs text-gray-700 leading-relaxed">
                            Llega el <span class="font-bold">Martes, 17 de Marzo</span>. 
                            <a href="#" class="text-amazon-blue hover:underline">Ver detalles</a>
                        </p>
                        <div class="flex items-center gap-2 text-green-700 text-lg font-bold">
                            <i class="fas fa-check text-xs"></i> En stock
                        </div>
                    </div>

                    <form action="{{ route('cart.add') }}" method="POST" class="space-y-4">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        
                        <div class="flex items-center gap-3">
                            <span class="text-xs font-bold text-gray-700">Cant:</span>
                            <select name="quantity" class="bg-gray-100 border border-gray-300 rounded-full py-1 px-4 text-xs focus:ring-1 focus:ring-yellow-500 shadow-sm cursor-pointer">
                                <option value="1">1</option><option value="2">2</option><option value="3">3</option>
                            </select>
                        </div>

                        <div class="space-y-2">
                            <button type="submit" class="w-full bg-[#f7ca00] hover:bg-[#f2c200] border border-[#e2b100] py-2.5 rounded-full text-sm font-medium transition-all shadow-sm active:scale-95">
                                Agregar al carrito
                            </button>
                            
                            <button type="submit" name="redirect" value="checkout" class="w-full bg-[#fa8900] hover:bg-[#f38200] border border-[#e47c00] py-2.5 rounded-full text-sm font-medium transition-all shadow-sm active:scale-95">
                                Comprar ahora
                            </button>
                        </div>
                    </form>

                    <div class="mt-6 pt-6 border-t border-gray-100 space-y-4">
                        <div class="flex items-center gap-3 text-[11px] text-gray-500">
                            <i class="fas fa-lock w-4 text-center"></i> 
                            <span>Transacción segura</span>
                        </div>
                        <div class="flex items-center gap-3 text-[11px] text-gray-500">
                            <i class="fas fa-truck w-4 text-center"></i> 
                            <span>Enviado por Amazon UNAB</span>
                        </div>
                        <button class="w-full bg-gray-50 border border-gray-300 py-1.5 rounded-lg text-xs font-medium hover:bg-gray-100 transition-colors">
                            Añadir a la lista de deseos
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection