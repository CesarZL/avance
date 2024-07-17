<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use Illuminate\Http\Request;

class ConsultaController extends Controller
{

    public function index()
    {
        return view('consultas.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'servicio' => 'required',
            'fecha' => 'required|date',
            'hora' => 'required',
        ]);

        $consulta = new Consulta();
        $consulta->user_id = auth()->id();
        $consulta->servicio = $request->servicio;
        $consulta->fecha = $request->fecha;
        $consulta->hora = $request->hora;
        $consulta->save();

        return redirect()->route('consultas.index')
            ->with('success', 'Cita agendada correctamente');
    }
    
}


// <x-guest-layout>
//     <x-authentication-card>

//         <div class="sm:mx-auto sm:w-full sm:max-w-sm mt-32">
//             <h2 class="mt-10 text-center text-3xl font-bold leading-9 tracking-tight text-gray-800">Agendar una cita médica</h2>
//         </div>
        
//         <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
//             <x-validation-errors class="mb-4" />
//             <form class="space-y-6" method="POST" action="{{ route('consulta.store') }}">
//                 @csrf
                
//                 <div class="mt-4">
//                     <x-label for="servicio" value="{{ __('Selecciona un servicio') }}" />
//                     <select id="servicio" name="servicio" class="border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-md shadow-sm block mt-1 w-full" required>
//                         <option value="">{{ __('Elige...') }}</option>
//                         <option value="Consulta">{{ __('Consulta') }}</option>
//                         <option value="Control">{{ __('Control') }}</option>
//                         <option value="Revision">{{ __('Revisión') }}</option>
//                     </select>
//                 </div>

//                 <div class="mt-4">
//                     <x-label for="fecha" value="{{ __('Fecha') }}" />
//                     <x-input id="fecha" class="block mt-1 w-full" type="date" name="fecha" required />
//                 </div>
    
//                 <div class="mt-4">
//                     <x-label for="hora" value="{{ __('Hora') }}" />
//                     <x-input id="hora" class="block mt-1 w-full" type="time" name="hora" required />
//                 </div>

//                 <div class="flex items-center justify-end mt-4">
//                    @auth
//                     <button type="submit" class="flex w-full justify-center rounded-2xl bg-blue-600 px-3 py-3 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">
//                         {{ __('Agendar cita') }}
//                     </button>
//                    @else
//                         <p class="flex w-full justify-center text-sm text-gray-600">Para agendar una cita, por favor <a class="ms-1 text-blue-600 hover:text-blue-900" href="{{ route('login') }}">inicia sesión</a></p>
//                    @endauth    
                    
//                 </div>
//             </form>
//         </div>
//     </x-authentication-card>
// </x-guest-layout>
