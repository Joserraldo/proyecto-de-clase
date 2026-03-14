@extends('layout.app')

@section('title', 'Detalle: ' . $product->name)

@section('content')
    <div class="container" style="max-width: 1200px; margin: 20px auto; padding: 0 20px;">
        <p style="margin-bottom: 20px;">
            <a href="{{ route('product.index') }}" style="text-decoration: none; color: #007185; font-size: 14px;">‹ Volver a los resultados</a>
        </p>

        <div class="product-details" style="display: flex; gap: 40px; background: #fff; padding: 20px; border-radius: 8px;">
            <div class="details-left" style="flex: 1; text-align: center;">
                <img src="{{ $product->image ? asset('storage/' . $product->image) : 'https://cdn-icons-png.flaticon.com/512/428/428001.png' }}" 
                     alt="{{ $product->name }}" 
                     style="max-width: 100%; height: auto; border-radius: 4px;">
            </div>

            <div class="details-right" style="flex: 1.5;">
                <h1 style="font-size: 28px; font-weight: 500; margin-bottom: 5px;">{{ $product->name }}</h1>
                <p style="color: #007185; font-size: 14px;">Visita la tienda de UNAB Tech</p>
                
                <div style="height: 1px; background-color: #ddd; margin: 15px 0;"></div>
                
                <p class="price" style="font-size: 28px; color: #0F1111; margin-bottom: 10px;">
                    <span style="font-size: 14px; vertical-align: top; margin-right: 2px;">$</span>{{ number_format($product->price, 2) }}
                </p>
                
                <p><strong>Sobre este artículo:</strong></p>
                <ul style="padding-left: 20px; line-height: 1.6;">
                    <li>Potencia extrema para desarrollo en Laravel.</li>
                    <li>Pantalla optimizada para largas sesiones de código.</li>
                    <li>Compatible con XAMPP y Docker de fábrica.</li>
                </ul>
                
                <p><strong>Descripción:</strong></p>
                <p style="line-height: 1.5; color: #333;">{{ $product->description }}</p>
                
                <div style="height: 1px; background-color: #ddd; margin: 15px 0;"></div>
                
                <div class="buy-box" style="border: 1px solid #ddd; padding: 20px; border-radius: 8px; width: 300px;">
                    <p class="price" style="font-size: 24px; font-weight: 400;">${{ number_format($product->price, 2) }}</p>
                    <p style="color: #007600; font-weight: bold; font-size: 14px;">Entrega GRATIS próximamente.</p>
                    <p style="font-size: 14px;">Estado: <strong style="color: #007600;">Disponible</strong></p>
                    
                    <form action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <button type="submit" class="btn-amazon" style="display: block; width: 100%; padding: 10px; background: #ffd814; border: 1px solid #fcd200; border-radius: 20px; cursor: pointer; margin-bottom: 10px; font-weight: 500;">
                            Agregar al Carrito
                        </button>
                    </form>
                    
                    <button class="btn-amazon" style="display: block; width: 100%; padding: 10px; background: #ffa41c; border: 1px solid #ff8f00; border-radius: 20px; cursor: pointer; font-weight: 500;">
                        Comprar ahora
                    </button>
                    
                    <p style="font-size: 12px; color: #565959; margin-top: 10px; text-align: center;">Transacción segura</p>
                </div>
                
                <p style="font-size: 12px; margin-top: 15px; color: #565959;">ID del producto: #{{ str_pad($product->id, 3, '0', STR_PAD_LEFT) }}</p>
            </div>
        </div>
    </div>
@endsection