<x-app-layout>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-semibold text-gray-900">Doctores</h1>
            <a href="{{ route('doctores.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:bg-blue-700">Añadir Doctor</a>
        </div>

        @if (session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <table class="w-full divide-y divide-gray-200">
                <thead>
                    <tr>
                        <th class="px-6 py-3 bg-gray-50 text-center font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                        <th class="px-6 py-3 bg-gray-50 text-center font-medium text-gray-500 uppercase tracking-wider">Especialización</th>
                        <th class="px-6 py-3 bg-gray-50 text-center font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($doctors as $doctor)
                        <tr>
                            <td class="px-6 py-4 text-center whitespace-nowrap">{{ $doctor->user->name }}</td>
                            <td class="px-6 py-4 text-center whitespace-nowrap">{{ $doctor->specialization }}</td>
                            <td class="px-6 py-4 text-center whitespace-nowrap">
                                <a href="{{ route('doctores.show', $doctor->id) }}" class="px-4 py-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-600 focus:bg-yellow-600">Ver</a>
                                <a href="{{ route('doctores.edit', $doctor->id) }}" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:bg-blue-600">Editar</a>
                                <form action="{{ route('doctores.destroy', $doctor->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 focus:bg-red-700" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>


