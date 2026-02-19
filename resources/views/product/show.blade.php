<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Detalle del Producto</title>
</head>
<body>
    @include ('layout.navbar')

    <div class="container">
        <div class="product-details">
            <div class="details-left">
                <img src="https://cdn-icons-png.flaticon.com/512/428/428001.png" alt="Producto">
            </div>

            <div class="details-right">
                <h1>Laptop Gamer Pro</h1>
                <p style="color: #007185;">Visita la tienda de Desarrollo UNAB</p>
                <div class="divider"></div>
                <p class="price" style="font-size: 28px;">$1,200.50</p>
                <p><strong>Descripción:</strong></p>
                <p>Esta es una descripción detallada al estilo Amazon. Ideal para desarrolladores que buscan potencia y velocidad en sus proyectos de Laravel 2026.</p>
                <div class="divider"></div>
                
                <div class="buy-box">
                    <p class="price">$1,200.50</p>
                    <p style="color: #007600;">Entrega GRATIS el lunes, 23 de febrero.</p>
                    <p>Estado: <strong>Disponible</strong></p>
                    <button class="btn-amazon" style="margin-bottom: 10px;">Agregar al Carrito</button>
                    <button class="btn-amazon" style="background-color: #ffa41c; border-color: #ff8f00;">Comprar ahora</button>
                </div>
                <p style="font-size: 12px; margin-top: 10px;">ID del producto: 001</p>
            </div>
        </div>
    </div>
    @include ('layout.footer')
</body>
</html>