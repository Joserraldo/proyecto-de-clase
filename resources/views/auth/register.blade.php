<x-guest-layout>
    <div class="min-h-screen bg-white flex flex-col items-center pt-8 sm:pt-16 pb-12">
        <div class="mb-6 flex justify-center">
            <!-- Logo Re-styling for Amazon UNAB -->
            <a href="/" class="flex flex-col items-center group">
                <span class="text-3xl font-black text-amazon-navy flex items-center">
                    amazon<span class="text-amazon-orange italic ml-1">UNAB</span>
                </span>
            </a>
        </div>

        <div class="bg-white border border-gray-300 rounded-lg p-6 sm:p-8 shadow-sm w-full max-w-sm">
            <h1 class="text-3xl font-medium mb-6 text-gray-900">Crear cuenta</h1>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div class="mb-4">
                    <label for="name" class="block text-sm font-bold text-gray-800 mb-1">Tu nombre</label>
                    <input id="name" 
                           class="block w-full border border-gray-400 rounded-sm px-3 py-2 text-sm focus:border-amazon-blue focus:ring-1 focus:ring-amazon-blue transition-all" 
                           type="text" name="name" :value="old('name')" placeholder="Nombres y apellidos" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-1" />
                </div>

                <!-- Email Address -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-bold text-gray-800 mb-1">Correo electrónico</label>
                    <input id="email" 
                           class="block w-full border border-gray-400 rounded-sm px-3 py-2 text-sm focus:border-amazon-blue focus:ring-1 focus:ring-amazon-blue transition-all" 
                           type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-1" />
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label for="password" class="block text-sm font-bold text-gray-800 mb-1">Contraseña</label>
                    <input id="password" 
                           class="block w-full border border-gray-400 rounded-sm px-3 py-2 text-sm focus:border-amazon-blue focus:ring-1 focus:ring-amazon-blue transition-all"
                           type="password" name="password" placeholder="Al menos 8 caracteres" required autocomplete="new-password" />
                    <p class="text-xs text-gray-500 mt-1 flex items-center"><i class="fas fa-info-circle text-amazon-blue mr-1"></i> La contraseña debe tener al menos 8 caracteres.</p>
                    <x-input-error :messages="$errors->get('password')" class="mt-1" />
                </div>

                <!-- Confirm Password -->
                <div class="mb-6">
                    <label for="password_confirmation" class="block text-sm font-bold text-gray-800 mb-1">Vuelve a escribir la contraseña</label>
                    <input id="password_confirmation" 
                           class="block w-full border border-gray-400 rounded-sm px-3 py-2 text-sm focus:border-amazon-blue focus:ring-1 focus:ring-amazon-blue transition-all"
                           type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
                </div>

                <button type="submit" class="w-full bg-amazon-button py-2 rounded-lg text-sm font-medium border border-gray-300 shadow-sm hover:bg-yellow-400 focus:outline-none transition-all">
                    Verifica tu correo electrónico
                </button>

                <div class="mt-6 text-xs text-gray-700 leading-relaxed border-t border-gray-100 pt-4">
                    Al crear una cuenta, aceptas las <a href="#" class="text-amazon-blue hover:underline hover:text-orange-700">Condiciones de uso</a> y el <a href="#" class="text-amazon-blue hover:underline hover:text-orange-700">Aviso de privacidad</a> de Amazon UNAB.
                </div>

                <div class="mt-6 text-sm">
                    ¿Ya tienes una cuenta? 
                    <a class="text-amazon-blue hover:text-orange-700 hover:underline inline-flex items-center" href="{{ route('login') }}">
                        Inicia sesión <i class="fas fa-caret-right ml-1 text-xs"></i>
                    </a>
                </div>
            </form>
        </div>

        <div class="mt-16 border-t border-gray-200 w-full pt-8 flex flex-col items-center">
            <div class="flex gap-8 text-xs text-amazon-blue mb-2">
                <a href="#" class="hover:underline hover:text-orange-700">Condiciones de uso</a>
                <a href="#" class="hover:underline hover:text-orange-700">Aviso de privacidad</a>
                <a href="#" class="hover:underline hover:text-orange-700">Ayuda</a>
            </div>
            <p class="text-[10px] text-gray-500 mt-2">© 2026, Amazon-UNAB.com, Inc. o sus filiales</p>
        </div>
    </div>
</x-guest-layout>
