@extends('layout.app')

{{-- Aquí defines el título específico para la pestaña del navegador --}}
@section('title', 'Inicio - Listado de Productos')

@section('content')
    <div class="results-bar">
        1-5 de 5 resultados para <span style="color: #c45500; font-weight: bold;">"Electrónicos de Clase"</span>
    </div>

    <div class="container">
        <div class="product-grid">
            @php
                // Array de 5 productos fijos
                $poductos = [
                    [
                        'id' => 1, 
                        'nombre' => 'Laptop Gamer Pro X', 
                        'precio' => 1200.50, 
                        'desc' => 'Procesador de última generación, 16GB RAM, SSD 512GB.', 
                        'img' => 'https://cdn-icons-png.flaticon.com/512/428/428001.png', 
                        'estado' => 'Disponible'
                    ]
                ];
            @endphp

            @foreach($misProductos as $p)
            <div class="product-card">
                <a href="/tienda/{{ $p['id']   }}">
                </a>
                    @if ($p-> image)
                    <img src="{{ asset('storage/' . $p->image) }}" alt="{{ $p->name }}" style="width: 100%; height: auto; margin-bottom: 10px;">
                    @else
                    <img src="https://cdn-icons-png.flaticon.com/512/428/428001.png" alt="{{ $p->name }}" style="width: 100%; height: auto; margin-bottom: 10px;">
                    @endif

                <a href="/tienda/{{ $p['id'] }}" style="text-decoration: none;">
                    <h3>{{ $p['nombre'] }}</h3>
                </a>
                
                <p style="font-size: 0.8rem; color: #565959;">ID: #{{ $p['id'] }}</p>
                
                <p style="font-size: 0.9rem; margin: 5px 0;">{{ Str::limit($p['description'], 80) }}</p>
                
                <p class="price">
                    <span style="font-size: 0.8rem; vertical-align: top;">$</span>{{ number_format($p['price'], 2) }}
                </p>

                <div style="margin-top: 10px;">
                    <span class="status-badge {{ $p['state'] == 'Disponible' ? 'available' : 'unavailable' }}">
                        {{ $p['category_id'] }}
                    </span>
                </div>
                <form action="{{route('product.destroy',$p)}}" method="POST" ">
                    @method('DELETE')
                    @csrf    
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>

                <p style="font-size: 0.8rem; color: #007600; margin-top: 10px;">
                    ✓ Envío gratis a Bucaramanga
                </p>
            </div>
            @endforeach
        </div>
    </div>
@endsection