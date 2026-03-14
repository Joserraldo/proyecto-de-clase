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
                <a href="{{ route('product.show', $p) }}">
                    @if ($p->image)
                        <img src="{{ asset('storage/' . $p->image) }}" alt="{{ $p->name }}" style="width: 100%; height: 200px; object-fit: cover; margin-bottom: 10px;">
                    @else
                        <img src="https://cdn-icons-png.flaticon.com/512/428/428001.png" alt="{{ $p->name }}" style="width: 100%; height: 200px; object-fit: contain; margin-bottom: 10px;">
                    @endif
                </a>

                <a href="{{ route('product.show', $p) }}" style="text-decoration: none;">
                    <h3>{{ $p->name }}</h3>
                </a>
                
                <p style="font-size: 0.8rem; color: #565959;">Categoría: {{ $p->category->name ?? 'N/A' }}</p>
                
                <p style="font-size: 0.9rem; margin: 5px 0; color: #111;">{{ Str::limit($p->description, 80) }}</p>
                
                <p class="price" style="font-weight: bold; font-size: 1.2rem; color: #B12704;">
                    <span style="font-size: 0.8rem; vertical-align: top;">$</span>{{ number_format($p->price, 2) }}
                </p>

                <div class="actions" style="display: flex; gap: 10px; margin-top: 15px;">
                    <a href="{{ route('product.show', $p) }}" class="btn-amazon" style="flex: 1; text-align: center; text-decoration: none; padding: 5px; font-size: 0.8rem;">Ver detalle</a>
                    
                    <form action="{{ route('product.destroy', $p) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar este producto?')">
                        @method('DELETE')
                        @csrf    
                        <button type="submit" style="background: #f0f0f0; border: 1px solid #adb1b8; padding: 5px 10px; border-radius: 3px; cursor: pointer; font-size: 0.8rem;">Eliminar</button>
                    </form>
                </div>

                <p style="font-size: 0.8rem; color: #007600; margin-top: 10px;">
                    ✓ Envío gratis a Bucaramanga
                </p>
            </div>
            @endforeach
        </div>
    </div>
@endsection