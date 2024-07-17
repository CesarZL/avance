<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminDoctorController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\DoctorController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');  

    // Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');
    // Route::get('/productos/create', [ProductoController::class, 'create'])->name('productos.create');
    // Route::post('/productos', [ProductoController::class, 'store'])->name('productos.store');
    // Route::get('/productos/{producto}', [ProductoController::class, 'show'])->name('productos.show');
    // Route::get('/productos/{producto}/edit', [ProductoController::class, 'edit'])->name('productos.edit');
    // Route::put('/productos/{producto}', [ProductoController::class, 'update'])->name('productos.update');
    // Route::delete('/productos/{producto}', [ProductoController::class, 'destroy'])->name('productos.destroy');

    Route::get('/consulta', function () {
        return view('consultas.create');
    })->name('consulta.create');
    
    // Ruta para guardar la cita
    Route::post('/consulta', [ConsultaController::class, 'store'])->name('consulta.store');
    
    // Ruta para mostrar la lista de citas de un doctor
    Route::get('/consultas', [ConsultaController::class, 'index'])->name('consultas.index');

    
    // Hacer ruta para mostrar la lista de doctores en el perfil de admin
    Route::get('/doctores', [AdminController::class, 'index'])->name('doctores.index');
    Route::get('/doctores/create', [AdminController::class, 'create'])->name('doctores.create');
    Route::post('/doctores', [AdminController::class, 'store'])->name('doctores.store');
    Route::get('/doctores/{doctor}', [AdminController::class, 'show'])->name('doctores.show');
    Route::get('/doctores/{doctor}/edit', [AdminController::class, 'edit'])->name('doctores.edit');
    Route::put('/doctores/{doctor}', [AdminController::class, 'update'])->name('doctores.update');
    Route::delete('/doctores/{doctor}', [AdminController::class, 'destroy'])->name('doctores.destroy');

    // Hacer ruta para mostrar la lista de citas de un doctor
    Route::get('/citas', [DoctorController::class, 'citas'])->name('citas.index');
    Route::get('/citas/create', [DoctorController::class, 'create'])->name('citas.create');
    Route::post('/citas', [DoctorController::class, 'store'])->name('citas.store');
    Route::get('/citas/{cita}', [DoctorController::class, 'show'])->name('citas.show');
    Route::get('/citas/{cita}/edit', [DoctorController::class, 'edit'])->name('citas.edit');
    Route::put('/citas/{cita}', [DoctorController::class, 'update'])->name('citas.update');
    Route::delete('/citas/{cita}', [DoctorController::class, 'destroy'])->name('citas.destroy');


    // Hacer ruta para mamejar los horarios de un doctor
    Route::get('/horarios', [DoctorController::class, 'index'])->name('horarios.index');
    Route::post('/horarios', [DoctorController::class, 'storeSchedule'])->name('schedule.store');

    
    


});
