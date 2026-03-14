<nav class="navbar">
    <div class="nav-logo">
        <a href="/product">Amazon<span>UNAB</span></a>
    </div>

    <div class="nav-links">
        <a href="{{ route('product.index') }}">Inicio</a>
        <a href="{{ route('cart.index') }}">Carrito ({{ count(session('cart', [])) }})</a>
        <a href="#">Servicio al Cliente</a>
        <a href="{{ route('product.create') }}" class="btn-nav-create">+ Vender Producto</a>
    </div>
</nav>