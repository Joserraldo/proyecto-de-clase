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
                $productos = [
                    [
                        'id' => 1, 
                        'nombre' => 'Laptop Gamer Pro X', 
                        'precio' => 1200.50, 
                        'desc' => 'Procesador de última generación, 16GB RAM, SSD 512GB.', 
                        'img' => 'https://cdn-icons-png.flaticon.com/512/428/428001.png', 
                        'estado' => 'Disponible'
                    ],
                    [
                        'id' => 2, 
                        'nombre' => 'Mouse Ergonómico Inalámbrico', 
                        'precio' => 45.99, 
                        'desc' => 'Diseño vertical para reducir la tensión en la muñeca.', 
                        'img' => 'https://cdn-icons-png.flaticon.com/512/689/689311.png', 
                        'estado' => 'Agotado'
                    ],
                    [
                        'id' => 3, 
                        'nombre' => 'Teclado Mecánico RGB Switch Blue', 
                        'precio' => 89.00, 
                        'desc' => 'Retroiluminación personalizable y teclas anti-ghosting.', 
                        'img' => 'https://cdn-icons-png.flaticon.com/512/808/808439.png', 
                        'estado' => 'Disponible'
                    ],
                    [
                        'id' => 4, 
                        'nombre' => 'Monitor UltraWide 34"', 
                        'precio' => 450.00, 
                        'desc' => 'Pantalla curva perfecta para multitarea y edición.', 
                        'img' => 'https://cdn-icons-png.flaticon.com/512/910/910568.png', 
                        'estado' => 'Disponible'
                    ],
                    [
                        'id' => 5, 
                        'nombre' => 'Audífonos Bluetooth Noise Cancelling', 
                        'precio' => 199.99, 
                        'desc' => 'Cancelación activa de ruido y 30 horas de batería.', 
                        'img' => 'https://cdn-icons-png.flaticon.com/512/27/27131.png', 
                        'estado' => 'Disponible'
                    ]
                ];
            @endphp

            @foreach($productos as $p)
            <div class="product-card">
                <a href="/tienda/{{ $p['id'] }}">
                    <img src="{{ $p['img'] }}" alt="{{ $p['nombre'] }}">
                </a>

                <a href="/tienda/{{ $p['id'] }}" style="text-decoration: none;">
                    <h3>{{ $p['nombre'] }}</h3>
                </a>
                
                <p style="font-size: 0.8rem; color: #565959;">ID: #{{ $p['id'] }}</p>
                
                <p style="font-size: 0.9rem; margin: 5px 0;">{{ Str::limit($p['desc'], 80) }}</p>
                
                <p class="price">
                    <span style="font-size: 0.8rem; vertical-align: top;">$</span>{{ number_format($p['precio'], 2) }}
                </p>

                <div style="margin-top: 10px;">
                    <span class="status-badge {{ $p['estado'] == 'Disponible' ? 'available' : 'unavailable' }}">
                        {{ $p['estado'] }}
                    </span>
                </div>

                <p style="font-size: 0.8rem; color: #007600; margin-top: 10px;">
                    ✓ Envío gratis a Bucaramanga
                </p>
            </div>
            @endforeach
        </div>
    </div>
@endsection