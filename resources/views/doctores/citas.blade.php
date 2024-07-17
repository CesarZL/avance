<x-app-layout>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-semibold text-gray-900">Citas Solicitadas</h1>
        </div>

        @if ($citas->isEmpty())
            <p class="text-gray-600">No hay citas solicitadas.</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($citas as $cita)
                    <div class="bg-white overflow-hidden shadow-sm rounded-lg">
                        <div class="p-4">
                            <p class="text-lg font-semibold text-gray-900">Fecha y Hora: {{ $cita->fecha_hora }}</p>
                            <p class="text-sm text-gray-600">Paciente: {{ $cita->paciente->name }}</p>
                            <p class="text-sm text-gray-600">Especialidad: {{ $cita->especialidad }}</p>
                            <p class="text-sm text-gray-600">Estado: {{ $cita->estado }}</p>
                        </div>
                        <div class="p-4 bg-gray-100 border-t border-gray-200">
                            @if ($cita->estado === 'pendiente')
                                <form action="{{ route('citas.aceptar', $cita->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-md">Aceptar</button>
                                </form>
                                <form action="{{ route('citas.cancelar', $cita->id) }}" method="POST" class="inline-block ml-2">
                                    @csrf
                                    <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-md">Cancelar</button>
                                </form>
                            @else
                                <p class="text-sm text-gray-600">Esta cita ya fue {{ $cita->estado }}</p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>
