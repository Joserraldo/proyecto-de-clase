<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <!-- Card Categorías -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border-b-4 border-indigo-500">
                    <div class="p-6 text-gray-900">
                        <div class="text-sm font-medium text-gray-500 uppercase">Total Categorías</div>
                        <div class="mt-1 text-3xl font-semibold">{{ $stats['categories'] }}</div>
                        <a href="{{ route('admin.categories.index') }}" class="mt-4 text-indigo-600 hover:text-indigo-900 text-sm block">Gestionar categorías →</a>
                    </div>
                </div>

                <!-- Card Productos -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border-b-4 border-green-500">
                    <div class="p-6 text-gray-900">
                        <div class="text-sm font-medium text-gray-500 uppercase">Total Productos</div>
                        <div class="mt-1 text-3xl font-semibold">{{ $stats['products'] }}</div>
                        <a href="{{ route('product.index') }}" class="mt-4 text-green-600 hover:text-green-900 text-sm block">Ver inventario →</a>
                    </div>
                </div>

                <!-- Card Carritos -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border-b-4 border-orange-500">
                    <div class="p-6 text-gray-900">
                        <div class="text-sm font-medium text-gray-500 uppercase">Carritos Activos</div>
                        <div class="mt-1 text-3xl font-semibold">{{ $stats['active_carts'] }}</div>
                        <a href="{{ route('admin.carts.index') }}" class="mt-4 text-orange-600 hover:text-orange-900 text-sm block">Revisar carritos →</a>
                    </div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Bienvenido al panel de administración. Selecciona una sección arriba para comenzar.") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
