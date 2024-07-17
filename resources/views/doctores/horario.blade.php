<x-app-layout>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <h1 class="text-2xl font-semibold text-gray-900 mb-6">Agregar Horarios</h1>

        <div class="bg-gray-50 shadow overflow-hidden sm:rounded-lg">
            <form method="POST" class="px-4 py-5 sm:px-6" action="{{ route('schedule.store') }}">
                @csrf

                <div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mt-4">
                        @foreach($days as $day)
                        <div class="bg-white p-4 rounded-lg shadow">
                            <label class="font-semibold">{{ ucfirst($day) }}</label>
                            <div class="mt-2">
                                <label for="{{ $day }}_inicio" class="block text-sm font-medium text-gray-700">Hora de inicio</label>
                                <select class="border-gray-300 focus:border-blue-500 focus:ring-blue-500 shadow-sm rounded-xl w-full"
                                        name="{{ $day }}_inicio" id="{{ $day }}_inicio">
                                    @foreach($startTimes as $startTime)
                                    <option value="{{ $startTime }}"
                                            {{ isset($schedules[$day]) && $schedules[$day]->start_time === $startTime ? 'selected' : '' }}>
                                        {{ $startTime }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mt-3">
                                <label for="{{ $day }}_termino" class="block text-sm font-medium text-gray-700">Hora de termino</label>
                                <select class="border-gray-300 focus:border-blue-500 focus:ring-blue-500 shadow-sm rounded-xl w-full"
                                        name="{{ $day }}_termino" id="{{ $day }}_termino">
                                    @foreach($endTimes as $endTime)
                                    <option value="{{ $endTime }}"
                                            {{ isset($schedules[$day]) && $schedules[$day]->end_time === $endTime ? 'selected' : '' }}>
                                        {{ $endTime }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mt-3">
                                <label for="citas_{{ $day }}" class="inline-flex items-center">
                                    <input type="checkbox" class="form-checkbox shadow-sm rounded-md"
                                           name="citas_{{ $day }}" id="citas_{{ $day }}"
                                           {{ isset($schedules[$day]) && $schedules[$day]->has_appointments ? 'checked' : '' }}>
                                    <span class="ml-2">¿Habrá citas este día?</span>
                                </label>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="px-4 py-3 text-right sm:px-6">
                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Guardar Horarios
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
