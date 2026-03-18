@extends('layout.app')

@section('title', 'Carrito de compras')

@section('content')
<div class="bg-[#EAEDED] min-h-screen py-8">
    <div class="max-w-[1500px] mx-auto px-6 flex flex-col lg:flex-row gap-6 font-roboto">
        <!-- Main Cart List -->
        <div class="flex-grow bg-white p-6 shadow-sm">
            <h1 class="text-3xl font-medium mb-1">Carrito de compras</h1>
            <button class="text-amazon-blue text-xs hover:underline mb-4">Desmarcar todos los artículos</button>
            <div class="text-xs text-gray-500 text-right mb-2">Precio</div>
            <div class="h-[1px] bg-gray-200 mb-6"></div>

            @if(count($cart) > 0)
                <div class="space-y-6">
                    @foreach($cart as $id => $details)
                    <div class="flex flex-col sm:flex-row gap-4">
                        <div class="w-full sm:w-44 h-44 flex-shrink-0 flex items-center justify-center bg-gray-50 rounded-sm p-4 overflow-hidden border border-gray-100">
                            <img src="{{ $details['image'] ? asset('storage/' . $details['image']) : 'https://cdn-icons-png.flaticon.com/512/428/428001.png' }}" 
                                 class="max-h-full max-w-full object-contain" alt="{{ $details['name'] }}"
                                 onerror="this.src='https://cdn-icons-png.flaticon.com/512/428/428001.png'">
                        </div>
                        <div class="flex-grow">
                            <div class="flex justify-between items-start gap-4">
                                <h2 class="text-lg font-medium text-gray-900 leading-tight truncate-2-lines">{{ $details['name'] }}</h2>
                                <span class="text-lg font-bold text-gray-900">${{ number_format($details['price'], 0, ',', '.') }}</span>
                            </div>
                            <p class="text-[10px] text-green-700 font-bold mt-1">En stock</p>
                            <p class="text-[10px] text-gray-500 mt-1">Envío GRATIS disponible</p>
                            
                            <div class="flex items-center gap-4 mt-4">
                                <div class="flex items-center bg-gray-100 border border-gray-300 rounded-md shadow-sm h-7 overflow-hidden">
                                    <span class="text-xs px-2 text-gray-500">Cant: {{ $details['quantity'] }}</span>
                                </div>
                                <div class="h-4 w-[1px] bg-gray-300"></div>
                                <form action="{{ route('cart.remove') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $id }}">
                                    <button type="submit" class="text-amazon-blue text-xs hover:underline">Eliminar</button>
                                </form>
                                <div class="h-4 w-[1px] bg-gray-300"></div>
                                <button type="button" class="text-amazon-blue text-xs hover:underline">Guardar para más tarde</button>
                            </div>
                        </div>
                    </div>
                    <div class="h-[1px] bg-gray-200 my-6"></div>
                    @endforeach
                </div>
                <div class="text-right text-lg">
                    Subtotal ({{ count($cart) }} productos): <span class="font-bold">${{ number_format($total, 0, ',', '.') }}</span>
                </div>
            @else
                <div class="text-center py-16">
                    <div class="text-gray-200 text-6xl mb-6"><i class="fas fa-shopping-basket"></i></div>
                    <h2 class="text-xl font-medium mb-2">Tu carrito de Amazon UNAB está vacío</h2>
                    <p class="text-xs text-gray-500 mb-6">Tus ofertas te esperan. Mira lo nuevo en tecnología.</p>
                    <a href="{{ route('product.index') }}" class="bg-amazon-button px-8 py-2 rounded-lg text-sm font-medium shadow-sm hover:bg-yellow-400 transition-colors">Seguir comprando</a>
                </div>
            @endif
        </div>

        <!-- Right Side: Proceed to Checkout -->
        <div class="w-full lg:w-[350px] flex-shrink-0">
            <div class="bg-white p-6 shadow-sm">
                <div class="flex items-center gap-2 mb-4">
                    <i class="fas fa-check-circle text-green-700 text-lg"></i>
                    <p class="text-[11px] text-gray-800">Tu pedido califica para <span class="text-green-700 font-bold font-roboto">Envío GRATIS</span>. Elige esta opción al finalizar la compra.</p>
                </div>

                <div class="text-lg mb-6 leading-tight">
                    Subtotal ({{ count($cart) }} productos): <br>
                    <span class="font-bold text-xl leading-tight block mt-1">${{ number_format($total, 0, ',', '.') }}.99</span>
                </div>

                <a href="{{ route('cart.checkout') }}" class="block w-full text-center bg-amazon-button py-2 rounded-lg text-sm font-medium shadow-sm hover:bg-yellow-400 transition-colors">
                    Proceder al pago
                </a>

                <div class="mt-4 border border-gray-200 rounded-md p-3 group cursor-pointer hover:bg-gray-50 transition-colors">
                    <div class="flex items-center justify-between text-xs">
                        <div class="flex flex-col">
                            <span class="font-bold">Descuentos de Amazon UNAB</span>
                            <span class="text-gray-500 mt-0.5">Añade un cupón para ahorrar más</span>
                        </div>
                        <i class="fas fa-chevron-right text-gray-400 text-[10px]"></i>
                    </div>
                </div>
            </div>

            <!-- Recently Viewed / Ads Placeholder -->
            <div class="bg-white p-6 shadow-sm mt-6">
                <h3 class="font-bold text-sm mb-4">Artículos vistos recientemente</h3>
                <div class="space-y-4">
                    @foreach($featuredProducts->take(2) as $p)
                    <div class="flex gap-3">
                        <img src="{{ $p->image ? asset('storage/' . $p->image) : 'https://cdn-icons-png.flaticon.com/512/428/428001.png' }}" class="w-16 h-16 object-contain" onerror="this.src='https://cdn-icons-png.flaticon.com/512/428/428001.png'">
                        <div class="flex flex-col justify-center">
                            <p class="text-xs font-medium text-amazon-blue line-clamp-1 truncate block w-40">{{ $p->name }}</p>
                            <span class="text-sm font-bold text-red-700 mt-1">${{ number_format($p->price, 0) }}</span>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
