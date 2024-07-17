<x-guest-layout>
    <x-authentication-card>

        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <h2 class="mt-10 text-center text-3xl font-bold leading-9 tracking-tight text-gray-800">Crea una cuenta</h2>
        </div>
        
        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <x-validation-errors class="mb-4" />
            <form class="space-y-6" method="POST" action="{{ route('register') }}">
                @csrf
                <div class="mt-2">
                    <x-label for="name" value="{{ __('Nombre') }}" />
                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required />
                </div>
                
                <div class="mt-2">
                    <x-label for="email" value="{{ __('Correo electrónico') }}" />
                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                </div>
                
                <div class="mt-2">
                    <x-label for="username" value="{{ __('Nombre de usuario') }}" />
                    <x-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required />
                </div>
                
                <div class="mt-2">
                    <x-label for="phone" value="{{ __('Teléfono') }}" />
                    <x-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required />
                </div>
                
                <div class="mt-4">
                    <x-label for="password" value="{{ __('Contraseña') }}" />
                    <x-input id="password" class="block mt-1 w-full" type="password" name="password" required/>
                </div>
    
                <div class="mt-4">
                    <x-label for="password_confirmation" value="{{ __('Confirma tu contraseña')}}" />
                    <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required/>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <a class="text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" href="{{ route('login') }}">
                        ¿Ya tienes una cuenta?
                    </a>
    
                    <button type="submit" class="flex w-full justify-center rounded-2xl bg-blue-600 px-3 py-3 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">
                        Crear cuenta
                    </button>
                </div>
            </form>
        </div>
    </x-authentication-card>
</x-guest-layout>
