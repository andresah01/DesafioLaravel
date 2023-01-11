<?php

use App\Http\Controllers\CitaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () { return view('index'); })->name("inicio");
Route::get('/login', function () { return view('login'); })->name("login.formulario");
Route::post('/login', [LoginController::class, 'validar_credencial'])->name("login.validar");
Route::get('/registrar', function () { return view('register'); })->name("register.formulario");
Route::post('/registrar', [RegisterController::class, 'register'])->name("register");
Route::get('/logout', [LogoutController::class, 'logout'])->name("logout");
// Reserva de citas
Route::get('/reservar', function () { return view('citas');})->name("cita.formulario");
Route::post('/reservar', [CitaController::class, 'agendar'])->name("cita.agendar");
// Listar citas
Route::get('/listar', function () { return view('listar_citas');})->name("cita.listar_formulario");
Route::post('/listar', [CitaController::class, 'listar_citas_por_fecha'])->name("cita.listar_por_fecha");
// Editar citas
Route::post('/editar/{cita}', [CitaController::class, 'editar_cita'])->name("cita.editar_cita");
Route::put('/actualizar/{cita}', [CitaController::class, 'actualizar_cita'])->name("cita.actualizar_cita");
// Calendario
Route::get('/calendario', function () { return view('calendario'); })->name("citas.calendario");
Route::get('/calendario/citas', [CitaController::class, 'listar_citas_activas'])->name("citas.calendario_lista");
Route::post('/calendario/citas/info_cita/{id_cita}', [CitaController::class, 'datos_cita_calendario'])->name("citas.calendario_info_cita");




