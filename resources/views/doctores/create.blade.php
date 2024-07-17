<x-app-layout>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h1 class="text-2xl font-semibold text-gray-900 mb-6">Agregar Doctor</h1>
                <x-validation-errors class="mb-4" />
                <form action="{{ route('doctores.store') }}" method="POST">
                    @csrf

                    <!-- Nombre -->
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
                        <input type="text" name="name" id="name" class="mt-1 block w-full px-3 py-2 border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 rounded-md shadow-sm focus:outline-none sm:text-sm" required>
                    </div>

                    <!-- Username -->
                    <div class="mb-4">
                        <label for="username" class="block text-sm font-medium text-gray-700">Nombre de usuario</label>
                        <input type="text" name="username" id="username" class="mt-1 block w-full px-3 py-2 border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 rounded-md shadow-sm focus:outline-none sm:text-sm" required>
                    </div>

                    <!-- Teléfono -->
                    <div class="mb-4">
                        <label for="phone" class="block text-sm font-medium text-gray-700">Teléfono</label>
                        <input type="text" name="phone" id="phone" class="mt-1 block w-full px-3 py-2 border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 rounded-md shadow-sm focus:outline-none sm:text-sm" required>
                    </div>
                    

                    <!-- Correo electrónico -->
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Correo Electrónico</label>
                        <input type="email" name="email" id="email" class="mt-1 block w-full px-3 py-2 border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 rounded-md shadow-sm focus:outline-none sm:text-sm" required>
                    </div>

                    <!-- Contraseña -->
                    <div class="mb-4">
                        <label for="password" class="block text-sm font-medium text-gray-700">Contraseña</label>
                        <input type="password" name="password" id="password" class="mt-1 block w-full px-3 py-2 border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 rounded-md shadow-sm focus:outline-none sm:text-sm" required>
                    </div>

                    <!-- Especialización -->
                    <div class="mb-4">
                        <label for="specialization" class="block text-sm font-medium text-gray-700">Especialización</label>
                        <input type="text" name="specialization" id="specialization" class="mt-1 block w-full px-3 py-2 border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 rounded-md shadow-sm focus:outline-none sm:text-sm" required>
                    </div>

                    <!-- Botón de enviar -->
                    <div class="">
                        <button type="submit" class="inline-block px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:bg-blue-700">Guardar</button>
                        <a href="{{ route('doctores.index') }}" class="inline-block px-4 py-2 bg-gray-200 text-gray-700 rounded-md ml-2 hover:bg-gray-300 focus:bg-gray-300">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
