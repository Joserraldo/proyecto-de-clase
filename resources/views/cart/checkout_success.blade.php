@extends('layout.app')

@section('title', '¡Pedido completado!')

@section('content')
<div class="bg-white min-h-[60vh] flex items-center justify-center py-20">
    <div class="max-w-xl text-center px-6">
        <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-8 shadow-inner">
            <i class="fas fa-check text-4xl text-green-600 animate-bounce"></i>
        </div>
        <h1 class="text-4xl font-black text-amazon-navy mb-4">¡Gracias por tu compra!</h1>
        <p class="text-gray-600 text-lg mb-10 leading-relaxed font-roboto">
            Tu pedido ha sido procesado con éxito. Hemos enviado la confirmación a tu correo universitario. 
            Prepárate para recibir tus productos de tecnología en el campus UNAB.
        </p>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <a href="{{ route('product.index') }}" class="bg-amazon-button hover:bg-yellow-400 py-3 rounded-full font-bold text-sm transition-all shadow-md">
                Seguir comprando
            </a>
            <a href="/" class="bg-amazon-navy text-white hover:bg-slate-800 py-3 rounded-full font-bold text-sm transition-all shadow-md">
                Ir al Inicio
            </a>
        </div>
        
        <div class="mt-12 pt-8 border-t border-gray-100 flex items-center justify-center gap-6 opacity-60">
            <div class="flex items-center gap-2 text-xs font-bold text-gray-400 italic">
                <i class="fas fa-microchip"></i> UNAB TECH
            </div>
            <div class="flex items-center gap-2 text-xs font-bold text-gray-400 italic">
                <i class="fas fa-box"></i> ENVÍO PRIME
            </div>
        </div>
    </div>
</div>
@endsection
