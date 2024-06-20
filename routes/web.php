<?php

use App\Http\Controllers\academia_cicloController;
use App\Http\Controllers\Academia_ventaController;
use App\Http\Controllers\ApoderadoController;
use App\Http\Controllers\cacecob_eventoController;
use App\Http\Controllers\ComprobanteController;
use App\Http\Controllers\empleadoController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\roleController;
use App\Http\Controllers\usuarioController;
use Illuminate\Cache\Events\CacheMissed;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('panel.index');
});

/*Route::get('/panel', function () {
    return view('panel.index');
});*/

Route::view('panel','panel.index')->name('panel');

Route::get('/reports', function () {
    return view('reports.reportes-prueba');
});

Route::get('/asesor_impulsa', function () {
    return view('asesor_impulsa.registros-impulsa');
});
/*Route::get('/usuarios', function () {
    return view('auth.usuarios');
});*/

/*Route::get('/registros', function () {
    return view('registros.registros-impulsa');
});*/
//Route::view('registros','registros.registros-impulsa')->name('registros-impulsa');
/*Route::get('/academia_ventas/apoderados', function () {
    return view('asesor_impulsa.registro-apoderado');
});*/


Route::resource('ciclos',academia_cicloController::class);
Route::resource('eventos',cacecob_eventoController::class);
Route::resource('empleados',empleadoController::class);
Route::resource('usuarios',usuarioController::class);
Route::resource('roles',roleController::class);
Route::resource('academia_ventas',Academia_ventaController::class);
Route::resource('/impulsa/apoderados',ApoderadoController::class);
Route::resource('estudiantes',EstudianteController::class);
Route::resource('comprobantes',ComprobanteController::class);
Route::get('/impulsa/ventas', [Academia_ventaController::class, 'asesorSales'])->name('/impulsa/ventas');




Route::get('/login', function () {
    return view('auth.login');
});
Route::get('/registros', function () {
    return view('registros.registros-impulsa');
});
Route::get('/404', function () {
    return view('pages.404');
});
