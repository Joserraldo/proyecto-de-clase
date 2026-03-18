<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-2xl text-amazon-navy leading-tight tracking-tight">
                <i class="fas fa-shopping-cart mr-2 text-amazon-orange"></i> {{ __('Monitor de Carritos Activos') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-10 bg-gray-50 min-h-screen font-roboto">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if (session('success'))
                <div class="mb-6 bg-green-50 border-l-4 border-green-500 p-4 rounded-r-md shadow-sm flex items-start">
                    <i class="fas fa-check-circle text-green-500 mt-0.5 mr-3"></i>
                    <div>
                        <h3 class="text-sm font-bold text-green-800">Éxito</h3>
                        <p class="text-sm text-green-700">{{ session('success') }}</p>
                    </div>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl border border-gray-200">
                <div class="px-6 py-4 border-b border-gray-100 bg-gray-50 flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <i class="fas fa-users text-amazon-blue text-lg"></i>
                        <h3 class="text-lg font-bold text-gray-800">Sesiones de Compra en Curso</h3>
                    </div>
                </div>

                @if($carts->isEmpty())
                    <div class="px-6 py-12 text-center">
                        <i class="fas fa-shopping-basket text-gray-300 text-5xl mb-4 block"></i>
                        <h3 class="text-lg font-bold text-gray-700 mb-1">Sin carritos activos</h3>
                        <p class="text-gray-500 text-sm">Los usuarios no tienen productos en sus carritos de compra actualmente.</p>
                    </div>
                @else
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Usuario</th>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Contacto</th>
                                    <th class="px-6 py-4 text-center text-xs font-bold text-gray-500 uppercase tracking-wider">Items en Carrito</th>
                                    <th class="px-6 py-4 text-right text-xs font-bold text-gray-500 uppercase tracking-wider">Gestión</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-100">
                                @foreach ($carts as $user)
                                    <tr class="hover:bg-gray-50 transition-colors">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center gap-3">
                                                <div class="w-8 h-8 rounded-full bg-blue-100 text-amazon-blue flex items-center justify-center font-bold">
                                                    {{ strtoupper(substr($user->name, 0, 1)) }}
                                                </div>
                                                <span class="text-sm font-bold text-gray-900">{{ $user->name }}</span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <i class="far fa-envelope mr-1 text-gray-400"></i> {{ $user->email }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-center">
                                            <span class="px-3 py-1 bg-orange-100 text-amazon-orange rounded-full text-xs font-bold">
                                                {{ $user->cartItems->sum('quantity') }} items
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <div class="flex items-center justify-end gap-3">
                                                <a href="{{ route('admin.carts.show', $user) }}" class="text-amazon-blue hover:text-amazon-orange transition-colors font-bold text-xs flex items-center gap-1" title="Inspeccionar">
                                                    <i class="fas fa-search"></i> Ver Carrito
                                                </a>
                                                
                                                <!-- Botón Notificar Oferta -->
                                                <form action="{{ route('admin.carts.notify', $user) }}" method="POST" class="inline">
                                                    @csrf
                                                    <button type="submit" class="bg-red-50 text-red-600 hover:bg-red-500 hover:text-white border border-red-200 hover:border-red-500 px-3 py-1.5 rounded-md text-xs font-bold transition-all shadow-sm active:scale-95 flex items-center gap-1">
                                                        <i class="fas fa-bolt text-red-500 group-hover:text-white"></i> Notificar Oferta
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
            
            <div class="mt-4 text-xs text-gray-500 text-center">
                Visualizado por Amazon UNAB Central
            </div>
        </div>
    </div>
</x-app-layout>
