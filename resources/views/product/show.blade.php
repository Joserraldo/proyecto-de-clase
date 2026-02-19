@extends('layout.app')

@section('title', 'Detalle: Laptop Gamer Pro')

@section('content')
    <div class="container">
        <p style="margin-bottom: 20px;">
            <a href="/tienda" style="text-decoration: none; color: #007185;">‹ Volver a los resultados</a>
        </p>

        <div class="product-details">
            <div class="details-left">
                <img src="https://cdn-icons-png.flaticon.com/512/428/428001.png" alt="Laptop Gamer Pro">
            </div>

            <div class="details-right">
                <h1>Laptop Gamer Pro</h1>
                <p style="color: #007185;">Marca: UNAB Tech Series 2026</p>
                
                <div class="divider"></div>
                
                <p class="price" style="font-size: 28px;">
                    <span style="font-size: 14px; vertical-align: top;">$</span>1,200.50
                </p>
                
                <p><strong>Sobre este artículo:</strong></p>
                <ul>
                    <li>Potencia extrema para desarrollo en Laravel.</li>
                    <li>Pantalla optimizada para largas sesiones de código.</li>
                    <li>Compatible con XAMPP y Docker de fábrica.</li>
                </ul>
                
                <p><strong>Descripción:</strong></p>
                <p>Esta es una descripción detallada al estilo Amazon. Ideal para desarrolladores que buscan potencia y velocidad en sus proyectos de clase.</p>
                
                <div class="divider"></div>
                
                <div class="buy-box">
                    <p class="price">$1,200.50</p>
                    <p style="color: #007600; font-weight: bold;">Entrega GRATIS el lunes, 23 de febrero.</p>
                    <p>Estado: <strong style="color: #007600;">Disponible</strong></p>
                    
                    <button class="btn-amazon" style="margin-bottom: 10px;">Agregar al Carrito</button>
                    <button class="btn-amazon" style="background-color: #ffa41c; border-color: #ff8f00;">Comprar ahora</button>
                    
                    <p style="font-size: 12px; color: #565959; margin-top: 10px;">Transacción segura</p>
                </div>
                
                <p style="font-size: 12px; margin-top: 15px; color: #565959;">ID del producto: #001</p>
            </div>
        </div>
    </div>
@endsection