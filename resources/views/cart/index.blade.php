@extends('layout.app')

@section('title', 'Carrito de Compras')

@section('content')
<div class="container" style="max-width: 1000px; margin: 20px auto; padding: 0 20px;">
    <h1 style="font-size: 28px; margin-bottom: 20px;">Carrito de Compras</h1>

    @if(session('success'))
        <div style="background-color: #e7f4e4; border: 1px solid #007600; color: #007600; padding: 15px; border-radius: 4px; margin-bottom: 20px;">
            {{ session('success') }}
        </div>
    @endif

    <div style="display: flex; gap: 20px;">
        <div style="flex: 3; background: #fff; padding: 20px; border-radius: 8px;">
            @if(count($cart) > 0)
                <table style="width: 100%; border-collapse: collapse;">
                    <thead>
                        <tr style="border-bottom: 1px solid #ddd;">
                            <th style="text-align: left; padding: 10px 0;">Producto</th>
                            <th style="text-align: center; padding: 10px 0;">Precio</th>
                            <th style="text-align: center; padding: 10px 0;">Cantidad</th>
                            <th style="text-align: right; padding: 10px 0;">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cart as $id => $details)
                            <tr style="border-bottom: 1px solid #ddd;">
                                <td style="padding: 15px 0; display: flex; align-items: center; gap: 15px;">
                                    <img src="{{ $details['image'] ? asset('storage/' . $details['image']) : 'https://cdn-icons-png.flaticon.com/512/428/428001.png' }}" 
                                         style="width: 60px; height: 60px; object-fit: cover; border-radius: 4px;">
                                    <div>
                                        <p style="font-weight: 500; margin: 0;">{{ $details['name'] }}</p>
                                        <p style="font-size: 12px; color: #007600;">En stock</p>
                                    </div>
                                </td>
                                <td style="text-align: center;">${{ number_format($details['price'], 2) }}</td>
                                <td style="text-align: center;">{{ $details['quantity'] }}</td>
                                <td style="text-align: right; font-weight: bold;">${{ number_format($details['price'] * $details['quantity'], 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div style="text-align: center; padding: 40px 0;">
                    <p style="font-size: 18px; color: #565959;">Tu carrito de UNAB está vacío.</p>
                    <a href="{{ route('product.index') }}" style="color: #007185; text-decoration: none;">Seguir comprando</a>
                </div>
            @endif
        </div>

        <div style="flex: 1; background: #fff; padding: 20px; border-radius: 8px; height: fit-content; border: 1px solid #ddd;">
            <p style="font-size: 18px; margin-bottom: 15px;">Subtotal ({{ count($cart) }} productos): <br><strong>${{ number_format($total, 2) }}</strong></p>
            
            <a href="{{ route('cart.checkout') }}" 
               style="display: block; width: 100%; text-align: center; padding: 10px; background: #ffd814; border: 1px solid #fcd200; border-radius: 20px; cursor: pointer; font-weight: 500; text-decoration: none; color: #000;">
                Proceder al pago
            </a>
            
            <p style="font-size: 12px; margin-top: 15px; color: #565959;">El envío es GRATUITO para miembros Prime.</p>
        </div>
    </div>
</div>
@endsection
