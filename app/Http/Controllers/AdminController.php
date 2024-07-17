<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\User;

class AdminController extends Controller
{
    // Mostrar lista de doctores
    public function index()
    {
        $doctors = Doctor::all();
        return view('doctores.index', compact('doctors'));
    }

    // Mostrar formulario para crear un nuevo doctor
    public function create()
    {
        return view('doctores.create');
    }

    // Almacenar un nuevo doctor
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'name' => 'required|string',
            'username' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required', 'string', 'max:255', 'unique:users',
            'password' => 'required|min:6',
            'specialization' => 'required|string',
        ]);

        // Crear el usuario asociado al doctor
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'username' => $request->input('username'),
            'password' => bcrypt($request->input('password')),
            'type' => 'doctor',
        ]);

        // Crear el doctor asociado al usuario
        $doctor = Doctor::create([
            'user_id' => $user->id,
            'specialization' => $request->input('specialization'),
            // Puedes incluir más campos según tu estructura de datos
        ]);

        // Redireccionar con un mensaje de éxito
        return redirect()->route('doctores.index')->with('success', 'Doctor registrado correctamente.');
    }

    // Mostrar los detalles de un doctor
    public function show($id)
    {
        $doctor = Doctor::findOrFail($id);
        return view('doctores.show', compact('doctor'));
    }

    // Mostrar el formulario para editar un doctor
    public function edit($id)
    {
        $doctor = Doctor::findOrFail($id);
        return view('doctores.edit', compact('doctor'));
    }

    // Actualizar un doctor
    public function update(Request $request, $id)
    {
        // Validar los datos del formulario
        $request->validate([
            'specialization' => 'required|string',
            // Puedes incluir más validaciones según tus requisitos
        ]);

        // Buscar y actualizar el doctor
        $doctor = Doctor::findOrFail($id);
        $doctor->specialization = $request->input('specialization');
        // Actualizar más campos según tu estructura de datos
        $doctor->save();

        // Redireccionar con un mensaje de éxito
        return redirect()->route('doctores.index')->with('success', 'Doctor actualizado correctamente.');
    }

    // Eliminar un doctor
    public function destroy($id)
    {
        // Buscar y eliminar el usuario asociado al doctor y el doctor
        $doctor = Doctor::findOrFail($id);
        $doctor->user->delete();
        $doctor->delete();

        // Redireccionar con un mensaje de éxito
        return redirect()->route('doctores.index')->with('success', 'Doctor eliminado correctamente.');
    }
}
