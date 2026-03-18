@extends('layout.app')

@section('title', 'Vender en Amazon UNAB')

@section('content')
<div class="bg-gray-50 min-h-screen py-10 font-roboto">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header -->
        <div class="text-center mb-8">
            <h1 class="text-3xl font-medium text-gray-900 mb-2">Vender en Amazon UNAB</h1>
            <p class="text-sm text-gray-500">Agrega un nuevo producto a nuestro catálogo premium universitario.</p>
        </div>

        <!-- Form Card -->
        <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden">
            <div class="px-8 py-6 border-b border-gray-100 bg-gray-50 flex items-center gap-3">
                <i class="fas fa-box-open text-amazon-blue text-xl"></i>
                <h2 class="text-lg font-bold text-gray-800">Detalles del Producto</h2>
            </div>

            <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data" class="p-8">
                @csrf
                
                <div class="space-y-6">
                    <!-- Nombre -->
                    <div>
                        <label for="nombre" class="block text-sm font-bold text-gray-700 mb-1">Nombre del producto <span class="text-red-500">*</span></label>
                        <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}" 
                               class="w-full border-gray-300 rounded-md shadow-sm focus:border-yellow-500 focus:ring-yellow-500 sm:text-sm py-2 px-3 border"
                               placeholder="Ej: Teclado Mecánico Logitech G Pro" required>
                        @error('nombre')
                            <p class="mt-1 text-xs text-red-600 font-medium"><i class="fas fa-exclamation-circle"></i> {{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Precio -->
                        <div>
                            <label for="precio" class="block text-sm font-bold text-gray-700 mb-1">Precio (COP) <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="text-gray-500 sm:text-sm">$</span>
                                </div>
                                <input type="number" id="precio" name="precio" value="{{ old('precio') }}" step="0.01" min="0" 
                                       class="w-full pl-7 border-gray-300 rounded-md shadow-sm focus:border-yellow-500 focus:ring-yellow-500 sm:text-sm py-2 px-3 border" 
                                       placeholder="0.00" required>
                            </div>
                            @error('precio')
                                <p class="mt-1 text-xs text-red-600 font-medium"><i class="fas fa-exclamation-circle"></i> {{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Categoría -->
                        <div>
                            <label for="categoria" class="block text-sm font-bold text-gray-700 mb-1">Categoría <span class="text-red-500">*</span></label>
                            <select id="categoria" name="categoria" class="w-full border-gray-300 rounded-md shadow-sm focus:border-yellow-500 focus:ring-yellow-500 sm:text-sm py-2 px-3 border" required>
                                <option value="" disabled selected>Selecciona una categoría</option>
                                @foreach($categories as $c)
                                    <option value="{{ $c->id }}" {{ old('categoria') == $c->id ? 'selected' : '' }}>{{ $c->name }}</option>
                                @endforeach
                            </select>
                            @error('categoria')
                                <p class="mt-1 text-xs text-red-600 font-medium"><i class="fas fa-exclamation-circle"></i> {{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Descripción -->
                    <div>
                        <label for="descripcion" class="block text-sm font-bold text-gray-700 mb-1">Descripción del producto <span class="text-red-500">*</span></label>
                        <p class="text-xs text-gray-500 mb-2">Describe las características principales. Esto aparecerá en la sección "Sobre este artículo".</p>
                        <textarea id="descripcion" name="descripcion" rows="4" 
                                  class="w-full border-gray-300 rounded-md shadow-sm focus:border-yellow-500 focus:ring-yellow-500 sm:text-sm py-2 px-3 border" required>{{ old('descripcion') }}</textarea>
                        @error('descripcion')
                            <p class="mt-1 text-xs text-red-600 font-medium"><i class="fas fa-exclamation-circle"></i> {{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Imagen -->
                    <div>
                        <label for="imagen" class="block text-sm font-bold text-gray-700 mb-1">Imagen del producto <span class="text-red-500">*</span></label>
                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md hover:bg-gray-50 transition-colors">
                            <div class="space-y-1 text-center">
                                <i class="fas fa-image text-3xl text-gray-400 mb-2"></i>
                                <div class="flex flex-col items-center text-sm text-gray-600">
                                    <label for="imagen" class="relative cursor-pointer bg-white rounded-md font-medium text-amazon-blue hover:text-orange-600 focus-within:outline-none py-1 px-3 border border-gray-200">
                                        <span>Sube un archivo</span>
                                        <input id="imagen" name="imagen" type="file" class="sr-only" accept="image/*" required>
                                    </label>
                                    <p class="pl-1 mt-2">o arrastra y suelta aquí</p>
                                </div>
                                <p class="text-xs text-gray-500">PNG, JPG, GIF hasta 2MB</p>
                            </div>
                        </div>
                        @error('imagen')
                            <p class="mt-1 text-xs text-red-600 font-medium"><i class="fas fa-exclamation-circle"></i> {{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mt-10 pt-6 border-t border-gray-200 flex items-center justify-end gap-4">
                    <a href="{{ route('product.index') }}" class="text-sm font-medium text-gray-700 hover:text-gray-900 transition-colors">
                        Cancelar
                    </a>
                    <button type="submit" class="bg-[#f7ca00] hover:bg-[#f2c200] border border-[#e2b100] py-2 px-8 rounded-full text-sm font-bold shadow-sm transition-all active:scale-95">
                        Agregar a la tienda
                    </button>
                </div>
            </form>
        </div>
        
        <div class="mt-6 text-center">
            <p class="text-[11px] text-gray-500">
                Al crear un producto, aceptas las <a href="#" class="text-amazon-blue hover:underline">Condiciones de Uso</a> y <a href="#" class="text-amazon-blue hover:underline">Venta</a> de Amazon UNAB.
            </p>
        </div>
    </div>
</div>
@endsection