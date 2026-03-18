<header class="bg-amazon-dark text-white text-sm font-roboto">
    <!-- Top bar -->
    <div class="flex items-center px-4 py-2 gap-4">
        <!-- Logo -->
        <div class="flex items-center border border-transparent hover:border-white p-1 cursor-pointer">
            <a href="/" class="flex flex-col">
                <span class="text-xl font-bold tracking-tight">amazon<span class="amazon-orange">UNAB</span></span>
            </a>
        </div>

        <!-- Location -->
        <div class="hidden md:flex flex-col border border-transparent hover:border-white p-2 cursor-pointer leading-tight">
            <span class="text-gray-400 text-xs pl-4">Entregar a</span>
            <div class="flex items-center">
                <i class="fas fa-location-dot mr-1"></i>
                <span class="font-bold">Colombia</span>
            </div>
        </div>

        <!-- Search Bar -->
        <form action="{{ route('product.index') }}" method="GET" class="flex-grow flex items-center h-10">
            <div class="h-full bg-gray-100 text-gray-700 px-3 flex items-center rounded-l-md border-r border-gray-300 cursor-pointer hover:bg-gray-200">
                Todo <i class="fas fa-caret-down ml-2"></i>
            </div>
            <input type="text" name="search" value="{{ request('search') }}" class="flex-grow h-full px-3 text-black focus:outline-none focus:ring-2 focus:ring-yellow-500" placeholder="Buscar Amazon UNAB">
            <button type="submit" class="h-full bg-amazon-orange hover:bg-orange-400 px-5 rounded-r-md text-black transition-colors">
                <i class="fas fa-search text-lg text-gray-800"></i>
            </button>
        </form>

        <!-- Language -->
        <div class="hidden lg:flex items-center border border-transparent hover:border-white p-2 cursor-pointer gap-1">
            <span class="font-bold">ES</span> <i class="fas fa-caret-down text-gray-500"></i>
        </div>

        <!-- Account -->
        <div class="flex flex-col border border-transparent hover:border-white p-2 cursor-pointer leading-tight">
            @auth
                <span class="text-xs">Hola, {{ Auth::user()->name }}</span>
                <span class="font-bold">Cuenta y Listas <i class="fas fa-caret-down text-gray-500"></i></span>
            @else
                <a href="{{ route('login') }}" class="flex flex-col">
                    <span class="text-xs">Hola, Identifícate</span>
                    <span class="font-bold">Cuenta y Listas <i class="fas fa-caret-down text-gray-500"></i></span>
                </a>
            @endauth
        </div>

        <!-- Returns -->
        <div class="hidden md:flex flex-col border border-transparent hover:border-white p-2 cursor-pointer leading-tight">
            <span class="text-xs">Devoluciones</span>
            <span class="font-bold">y Pedidos</span>
        </div>

        <!-- Cart -->
        <a href="{{ route('cart.index') }}" class="flex items-end border border-transparent hover:border-white p-2 cursor-pointer relative">
            <div class="flex items-end">
                <div class="relative">
                    <span class="absolute -top-1 left-2.5 amazon-orange font-bold text-base leading-none">
                        {{ count(session('cart', [])) }}
                    </span>
                    <i class="fas fa-shopping-cart text-3xl"></i>
                </div>
                <span class="font-bold hidden sm:inline ml-1">Carrito</span>
            </div>
        </a>
    </div>

    <!-- Secondary bar -->
    <div class="bg-amazon-navy px-4 py-1 flex items-center gap-4 overflow-x-auto whitespace-nowrap">
        <div class="flex items-center gap-1 border border-transparent hover:border-white p-1 cursor-pointer font-bold">
            <i class="fas fa-bars"></i> Todo
        </div>
        <a href="{{ route('product.index') }}" class="border border-transparent hover:border-white p-1 cursor-pointer">Ofertas del día</a>
        <a href="{{ route('product.index') }}" class="border border-transparent hover:border-white p-1 cursor-pointer">Servicio al Cliente</a>
        <a href="{{ route('product.index') }}" class="border border-transparent hover:border-white p-1 cursor-pointer">Listas de Deseos</a>
        <a href="{{ route('product.index') }}" class="border border-transparent hover:border-white p-1 cursor-pointer">Tarjetas de Regalo</a>
        <a href="{{ route('product.create') }}" class="border border-transparent hover:border-white p-1 cursor-pointer font-bold text-yellow-300">Vender en UNAB</a>
    </div>
</header>