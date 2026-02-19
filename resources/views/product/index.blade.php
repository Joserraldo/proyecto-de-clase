<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amazon Clone | Proyecto UNAB</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        /* Unos retoques extra para que el index se vea impecable */
        .results-bar {
            background-color: white;
            padding: 10px 20px;
            border-bottom: 1px solid #ddd;
            margin-bottom: 20px;
            font-size: 0.9rem;
        }
        .product-card h3 {
            font-size: 1.1rem;
            margin: 10px 0;
            color: #007185;
        }
        .product-card h3:hover {
            color: #c45500;
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <nav class="navbar">
        <div style="display: flex; align-items: center; gap: 20px;">
            <h2 style="color: #ff9900; margin: 0;">Amazon<span style="color:white">UNAB</span></h2>
            <div style="background: white; border-radius: 4px; display: flex; flex-grow: 1; max-width: 600px;">
                <input type="text" placeholder="Buscar productos..." style="width: 100%; border: none; padding: 8px; border-radius: 4px 0 0 4px;">
                <button style="background: #febd69; border: none; padding: 0 15px; border-radius: 0 4px 4px 0; cursor: pointer;">🔍</button>
            </div>
        </div>
        <div style="margin-left: auto;">
            <a href="/tienda/crear" style="color: white; text-decoration: none; font-weight: bold; border: 1px solid white; padding: 5px 10px; border-radius: 3px;">+ Crear Producto</a>
        </div>
    </nav>

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

    <footer style="background-color: #232f3e; color: white; text-align: center; padding: 20px; margin-top: 40px;">
        <p>© 2026 Proyecto de Clase Laravel - @joserraldo</p>
    </footer>

</body>
</html>