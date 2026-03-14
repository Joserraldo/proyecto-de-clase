@extends('layout.app')

@section('title', 'Compra Exitosa')

@section('content')
<div class="container" style="max-width: 600px; margin: 40px auto; padding: 40px; background: #fff; border-radius: 8px; text-align: center; border: 1px solid #ddd;">
    <div style="color: #007600; font-size: 50px; margin-bottom: 20px;">
        ✓
    </div>
    <h1 style="font-size: 28px; color: #007600; margin-bottom: 15px;">¡Gracias por tu compra!</h1>
    <p style="font-size: 16px; color: #333; margin-bottom: 25px;">
        Tu pedido ha sido procesado con éxito. Recibirás un correo de confirmación en breve.
    </p>
    
    <div style="height: 1px; background-color: #ddd; margin: 25px 0;"></div>
    
    <p style="font-size: 14px; color: #565959; margin-bottom: 20px;">
        ID de Transacción: #{{ strtoupper(uniqid()) }}
    </p>

    <a href="{{ route('product.index') }}" 
       style="display: inline-block; padding: 10px 30px; background: #ffd814; border: 1px solid #fcd200; border-radius: 20px; cursor: pointer; font-weight: 500; text-decoration: none; color: #000;">
        Volver a la tienda
    </a>
</div>
@endsection
