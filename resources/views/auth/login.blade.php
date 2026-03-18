<x-guest-layout>
    <div class="min-h-screen bg-white flex flex-col items-center pt-10 sm:pt-20">
        <div class="mb-8 flex justify-center">
        <!-- Logo Re-styling for Amazon UNAB -->
        <a href="/" class="flex flex-col items-center group">
            <span class="text-3xl font-black text-amazon-navy flex items-center">
                amazon<span class="text-amazon-orange italic ml-1">UNAB</span>
            </div>
        </a>
    </div>

    <div class="bg-white border border-gray-200 rounded-lg p-8 shadow-sm max-w-sm mx-auto">
        <h1 class="text-3xl font-medium mb-6 text-gray-900">Iniciar sesión</h1>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="mb-5">
                <label for="email" class="block text-sm font-bold text-gray-800 mb-1">Email</label>
                <input id="email" 
                       class="block w-full border border-gray-400 rounded-sm px-3 py-2 text-sm focus:border-amazon-blue focus:ring-1 focus:ring-amazon-blue transition-all" 
                       type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-1" />
            </div>

            <!-- Password -->
            <div class="mb-6">
                <div class="flex justify-between items-center mb-1">
                    <label for="password" class="text-sm font-bold text-gray-800">Contraseña</label>
                    <a class="text-xs text-amazon-blue hover:text-orange-700 hover:underline" href="{{ route('password.request') }}">
                        ¿Olvidaste tu contraseña?
                    </a>
                </div>
                <input id="password" 
                       class="block w-full border border-gray-400 rounded-sm px-3 py-2 text-sm focus:border-amazon-blue focus:ring-1 focus:ring-amazon-blue transition-all"
                       type="password" name="password" required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-1" />
            </div>

            <button type="submit" class="w-full bg-amazon-button py-2 rounded-lg text-sm font-medium border border-gray-300 shadow-sm hover:bg-yellow-400 focus:outline-none transition-all">
                Continuar
            </button>

            <div class="mt-6 text-xs text-gray-700 leading-relaxed">
                Al continuar, aceptas las <span class="text-amazon-blue hover:underline cursor-pointer">Condiciones de uso</span> y el <span class="text-amazon-blue hover:underline cursor-pointer">Aviso de privacidad</span> de Amazon UNAB.
            </div>
            
            <div class="mt-6 flex items-center gap-2">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-amazon-orange focus:ring-amazon-orange shadow-sm" name="remember">
                <label for="remember_me" class="text-xs text-gray-600">Mantener sesión iniciada</label>
            </div>
        </form>
    </div>

    <div class="mt-10 flex flex-col items-center gap-4">
        <div class="relative w-full max-w-sm flex py-2 items-center">
            <div class="flex-grow border-t border-gray-200"></div>
            <span class="flex-shrink mx-4 text-xs text-gray-500">¿Eres nuevo en Amazon?</span>
            <div class="flex-grow border-t border-gray-200"></div>
        </div>
        <a href="{{ route('register') }}" class="w-full max-w-sm text-center bg-gray-50 border border-gray-300 py-2 rounded-lg text-sm font-medium hover:bg-gray-100 shadow-sm transition-all focus:outline-none">
            Crea tu cuenta de Amazon UNAB
        </a>
    </div>

    <div class="mt-20 border-t border-gray-200 pt-8 pb-10 flex flex-col items-center">
        <div class="flex gap-8 text-xs text-amazon-blue mb-2">
            <a href="#" class="hover:underline hover:text-orange-700">Condiciones de uso</a>
            <a href="#" class="hover:underline hover:text-orange-700">Aviso de privacidad</a>
            <a href="#" class="hover:underline hover:text-orange-700">Ayuda</a>
        </div>
        <p class="text-[10px] text-gray-500">© 2026, Amazon-UNAB.com, Inc. o sus filiales</p>
    </div>
</x-guest-layout>

