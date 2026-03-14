@extends('layout.app')

@section('title', 'Bienvenido a AmazonUNAB - Tu tienda premium')

@section('content')
<div class="landing-container">
    <!-- Hero Section / Carousel -->
    <div class="hero-banner" style="position: relative; height: 350px; background: linear-gradient(to bottom, rgba(0,0,0,0.3), #eaeded), url('https://images-na.ssl-images-amazon.com/images/G/01/AmazonExports/Fuji/2020/May/Hero/Fuji_TallHero_45M_es_US_1x._CB432534559_.jpg'); background-size: cover; background-position: center;">
        <div class="hero-text" style="position: absolute; bottom: 100px; left: 50%; transform: translateX(-50%); text-align: center; width: 100%;">
            <h1 style="font-size: 48px; color: #fff; text-shadow: 2px 2px 4px rgba(0,0,0,0.5); font-weight: 800;">Bienvenido a AmazonUNAB</h1>
            <p style="font-size: 20px; color: #fff; margin-top: 10px;">Encuentra la mejor tecnología y accesorios para tus proyectos.</p>
        </div>
    </div>

    <div class="container" style="max-width: 1300px; margin: -60px auto 40px; position: relative; z-index: 10; padding: 0 20px;">
        <!-- Quick Access Cards -->
        <div class="grid-cards" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 20px;">
            
            <!-- Card 1: Shop -->
            <div class="card" style="background: #fff; padding: 20px; display: flex; flex-direction: column; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                <h3 style="margin-bottom: 15px; font-size: 21px; font-weight: bold;">Explora nuestra Tienda</h3>
                <div style="flex-grow: 1; margin-bottom: 15px;">
                    <img src="https://images-na.ssl-images-amazon.com/images/G/01/AmazonExports/Fuji/2020/May/Dashboard/Fuji_Dash_Electronics_1x._SY304_CB432774322_.jpg" style="width: 100%; height: 250px; object-fit: cover;">
                </div>
                <a href="{{ route('product.index') }}" class="btn-amazon" style="text-align: center; text-decoration: none; padding: 10px; background: #ffd814; border: 1px solid #fcd200; border-radius: 4px; color: #111; font-weight: 500;">Ver todos los productos</a>
            </div>

            <!-- Card 2: Categories -->
            <div class="card" style="background: #fff; padding: 20px; display: flex; flex-direction: column; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                <h3 style="margin-bottom: 15px; font-size: 21px; font-weight: bold;">Categorías Populares</h3>
                <div class="cat-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px; flex-grow: 1;">
                    @foreach($categories->take(4) as $cat)
                        <div style="text-align: center;">
                            <div style="background: #f3f3f3; height: 100px; display: flex; align-items: center; justify-content: center; margin-bottom: 5px;">
                                <span style="font-size: 12px; font-weight: 500;">{{ $cat->name }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
                <a href="{{ route('product.index') }}" style="color: #007185; text-decoration: none; font-size: 14px; margin-top: 15px;">Explorar categorías</a>
            </div>

            <!-- Card 3: Admin / Auth -->
            <div class="card" style="background: #fff; padding: 20px; display: flex; flex-direction: column; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                <h3 style="margin-bottom: 15px; font-size: 21px; font-weight: bold;">Panel de Control</h3>
                <div style="flex-grow: 1; display: flex; flex-direction: column; justify-content: center; gap: 15px; padding: 10px 0;">
                    <p style="font-size: 14px; color: #565959;">Gestiona productos, categorías y revisa los carritos activos desde el panel administrativo.</p>
                </div>
                @auth
                    <a href="{{ route('dashboard') }}" class="btn-amazon" style="text-align: center; text-decoration: none; padding: 10px; background: #ffa41c; border: 1px solid #ff8f00; border-radius: 4px; color: #111; font-weight: 500;">Ir al Inicio Admin</a>
                @else
                    <a href="{{ route('login') }}" class="btn-amazon" style="text-align: center; text-decoration: none; padding: 10px; background: #ffa41c; border: 1px solid #ff8f00; border-radius: 4px; color: #111; font-weight: 500; margin-bottom: 10px;">Inicia Sesión como Admin</a>
                    <a href="{{ route('register') }}" style="text-align: center; color: #111; font-size: 14px; text-decoration: none; padding: 5px; border: 1px solid #adb1b8; border-radius: 4px; background: #e7e9ec;">Crear cuenta</a>
                @endauth
            </div>
        </div>

        <!-- Featured Products Section -->
        <div class="featured-products" style="margin-top: 40px; background: #fff; padding: 20px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
            <h3 style="margin-bottom: 20px; font-size: 21px; font-weight: bold;">Productos destacados</h3>
            <div style="display: flex; overflow-x: auto; gap: 15px; padding-bottom: 10px;">
                @foreach($featuredProducts as $fp)
                    <a href="{{ route('product.show', $fp) }}" style="text-decoration: none; min-width: 180px; text-align: center;">
                        <img src="{{ $fp->image ? asset('storage/' . $fp->image) : 'https://cdn-icons-png.flaticon.com/512/428/428001.png' }}" style="height: 150px; object-fit: contain; margin-bottom: 10px;">
                        <p style="color: #007185; font-size: 13px; font-weight: 500; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $fp->name }}</p>
                        <p style="color: #B12704; font-weight: 600;">{{ number_format($fp->price, 2) }}</p>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
