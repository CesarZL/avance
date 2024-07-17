<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Models\DoctorSchedule;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{
    public function index()
    {
        $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
        $doctorId = Doctor::where('user_id', Auth::id())->value('id');
    
        // Obtener los horarios del doctor
        $schedules = DoctorSchedule::where('doctor_id', $doctorId)
            ->whereIn('day', $days)
            ->get() 
            ->keyBy('day');
    
        // Definir las opciones de tiempo
        $startTimes = [
            '7:00', '7:55', '8:50', '9:45', '10:40', '11:10', '12:05', '13:00', '14:00'
        ];
    
        $endTimes = [
            '7:55', '8:50', '9:45', '10:40', '11:10', '12:05', '13:00', '14:00', '15:00'
        ];
        
        return view('doctores.horario', [
            'schedules' => $schedules,
            'days' => $days,
            'startTimes' => $startTimes,
            'endTimes' => $endTimes,
        ]);
    }
    
    
    
    public function storeSchedule(Request $request)
    {
        $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
        $doctorId = Doctor::where('user_id', Auth::id())->value('id');
    
        foreach ($days as $day) {
            if ($request->has($day.'_inicio') && $request->has($day.'_termino')) {
                $schedule = DoctorSchedule::where('doctor_id', $doctorId)
                    ->where('day', $day)
                    ->first();
    
                if (!$schedule) {
                    $schedule = new DoctorSchedule();
                    $schedule->doctor_id = $doctorId;
                    $schedule->day = $day;
                }
    
                $schedule->start_time = $request->input($day.'_inicio');
                $schedule->end_time = $request->input($day.'_termino');
    
                // Verifica si se seleccionó el checkbox para citas
                if ($request->has('citas_'.$day)) {
                    $schedule->has_appointments = true;
                } else {
                    $schedule->has_appointments = false;
                }
    
                $schedule->save();
            }
        }
    
        // Eliminar registros adicionales que no están siendo usados
        DoctorSchedule::where('doctor_id', $doctorId)
            ->whereNotIn('day', $days)
            ->delete();
    
        return redirect()->route('horarios.index')->with('success', 'Horarios actualizados correctamente');
    }
    
}
