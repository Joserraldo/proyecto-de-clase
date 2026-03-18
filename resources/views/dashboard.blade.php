<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-2xl text-amazon-navy leading-tight tracking-tight">
                {{ __('Panel de Vendedor') }}
            </h2>
            <span class="text-sm font-medium text-gray-500 bg-gray-100 px-3 py-1 rounded-full border border-gray-200">
                <i class="fas fa-store text-amazon-orange mr-1"></i> Amazon UNAB
            </span>
        </div>
    </x-slot>

    <div class="py-10 bg-gray-50 min-h-screen font-roboto">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Welcome Banner -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 mb-8 flex flex-col md:flex-row items-center justify-between">
                <div>
                    <h3 class="text-xl font-bold text-gray-900">Hola, {{ Auth::user()->name }}</h3>
                    <p class="text-gray-500 text-sm mt-1">Bienvenido a tu centro de control de Amazon UNAB. Aquí puedes gestionar tu inventario y ventas.</p>
                </div>
                <div class="mt-4 md:mt-0">
                    <a href="{{ route('product.create') }}" class="bg-[#f7ca00] hover:bg-[#f2c200] border border-[#e2b100] py-2.5 px-6 rounded-full text-sm font-bold shadow-sm transition-all inline-block active:scale-95 text-center whitespace-nowrap">
                        <i class="fas fa-plus-circle mr-2"></i> Añadir Producto
                    </a>
                </div>
            </div>

            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <!-- Card Productos -->
                <div class="bg-white rounded-2xl shadow-sm border-t-4 border-amazon-orange hover:shadow-md transition-shadow p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="text-sm font-bold text-gray-500 uppercase tracking-wider">Inventario Total</div>
                        <div class="w-10 h-10 rounded-full bg-orange-50 flex items-center justify-center text-amazon-orange">
                            <i class="fas fa-box-open text-lg"></i>
                        </div>
                    </div>
                    <div class="mt-1 text-4xl font-black text-gray-900">{{ $stats['products'] ?? '0' }}</div>
                    <a href="{{ route('product.index') }}" class="mt-6 text-amazon-blue hover:text-amazon-orange text-sm font-bold flex items-center gap-1 group">
                        Ver todo el catálogo <i class="fas fa-arrow-right text-xs transform group-hover:translate-x-1 transition-transform"></i>
                    </a>
                </div>

                <!-- Card Categorías -->
                <div class="bg-white rounded-2xl shadow-sm border-t-4 border-amazon-navy hover:shadow-md transition-shadow p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="text-sm font-bold text-gray-500 uppercase tracking-wider">Categorías Activas</div>
                        <div class="w-10 h-10 rounded-full bg-blue-50 flex items-center justify-center text-amazon-navy">
                            <i class="fas fa-tags text-lg"></i>
                        </div>
                    </div>
                    <div class="mt-1 text-4xl font-black text-gray-900">{{ $stats['categories'] ?? '0' }}</div>
                    <a href="{{ route('admin.categories.index') }}" class="mt-6 text-amazon-blue hover:text-amazon-orange text-sm font-bold flex items-center gap-1 group">
                        Gestionar estructura <i class="fas fa-arrow-right text-xs transform group-hover:translate-x-1 transition-transform"></i>
                    </a>
                </div>

                <!-- Card Carritos -->
                <div class="bg-white rounded-2xl shadow-sm border-t-4 border-green-500 hover:shadow-md transition-shadow p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="text-sm font-bold text-gray-500 uppercase tracking-wider">Pedidos en Curso</div>
                        <div class="w-10 h-10 rounded-full bg-green-50 flex items-center justify-center text-green-600">
                            <i class="fas fa-shopping-cart text-lg"></i>
                        </div>
                    </div>
                    <div class="mt-1 text-4xl font-black text-gray-900">{{ $stats['active_carts'] ?? '0' }}</div>
                    <a href="{{ route('admin.carts.index') }}" class="mt-6 text-amazon-blue hover:text-amazon-orange text-sm font-bold flex items-center gap-1 group">
                        Revisar carritos <i class="fas fa-arrow-right text-xs transform group-hover:translate-x-1 transition-transform"></i>
                    </a>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-100 bg-gray-50">
                    <h3 class="text-lg font-bold text-gray-800"><i class="fas fa-bolt text-yellow-500 mr-2"></i> Acciones Rápidas</h3>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-4">
                    <a href="{{ route('product.index') }}" class="flex items-center gap-4 p-4 rounded-xl border border-gray-100 hover:border-amazon-blue hover:bg-blue-50/30 transition-colors group">
                        <div class="bg-gray-100 p-3 rounded-lg text-gray-600 group-hover:bg-amazon-blue group-hover:text-white transition-colors">
                            <i class="fas fa-store"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900">Ir a la Tienda</h4>
                            <p class="text-xs text-gray-500">Ver cómo ven los clientes el catálogo B2C.</p>
                        </div>
                    </a>
                    
                    <a href="{{ route('profile.edit') }}" class="flex items-center gap-4 p-4 rounded-xl border border-gray-100 hover:border-gray-300 transition-colors group">
                        <div class="bg-gray-100 p-3 rounded-lg text-gray-600 group-hover:bg-gray-800 group-hover:text-white transition-colors">
                            <i class="fas fa-user-cog"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900">Configuración de Cuenta</h4>
                            <p class="text-xs text-gray-500">Actualiza tu contraseña e información personal.</p>
                        </div>
                    </a>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
