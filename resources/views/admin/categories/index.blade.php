<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-2xl text-amazon-navy leading-tight tracking-tight">
                {{ __('Gestión de Categorías') }}
            </h2>
            <a href="{{ route('admin.categories.create') }}" class="bg-[#f7ca00] hover:bg-[#f2c200] border border-[#e2b100] py-2 px-4 rounded-full text-sm font-bold shadow-sm transition-all inline-flex items-center active:scale-95 text-amazon-navy">
                <i class="fas fa-plus mr-2"></i> Nueva Categoría
            </a>
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
                <div class="px-6 py-4 border-b border-gray-100 bg-gray-50 flex items-center gap-3">
                    <i class="fas fa-tags text-amazon-blue text-lg"></i>
                    <h3 class="text-lg font-bold text-gray-800">Estructura del Catálogo</h3>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">ID</th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Nombre de Categoría</th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Slug (URL)</th>
                                <th scope="col" class="px-6 py-4 text-right text-xs font-bold text-gray-500 uppercase tracking-wider">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                            @forelse ($categories as $category)
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 font-medium">#{{ $category->id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-gray-900 flex items-center gap-2">
                                        <div class="w-8 h-8 rounded bg-blue-50 text-amazon-blue flex items-center justify-center">
                                            <i class="fas fa-tag text-xs"></i>
                                        </div>
                                        {{ $category->name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 font-mono text-xs">{{ $category->slug }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-right">
                                        <div class="flex justify-end gap-3">
                                            <a href="{{ route('admin.categories.edit', $category) }}" class="text-amazon-blue hover:text-amazon-orange transition-colors" title="Editar">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta categoría? Esta acción no se puede deshacer.')" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-gray-400 hover:text-red-500 transition-colors" title="Eliminar">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-12 text-center">
                                        <i class="fas fa-folder-open text-gray-300 text-4xl mb-3 block"></i>
                                        <p class="text-gray-500 text-sm">No hay categorías registradas aún.</p>
                                        <a href="{{ route('admin.categories.create') }}" class="text-amazon-blue hover:text-amazon-orange font-medium text-sm mt-2 inline-block">Crear la primera categoría</a>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            
            <div class="mt-4 text-xs text-gray-500 text-center">
                Visualizado por Amazon UNAB Central
            </div>
        </div>
    </div>
</x-app-layout>
