<?php

use App\Http\Controllers\academia_cicloController;
use App\Http\Controllers\Academia_ventaController;
use App\Http\Controllers\ApoderadoController;
use App\Http\Controllers\cacecob_eventoController;
use App\Http\Controllers\CacecobClientesController;
use App\Http\Controllers\CacecobpagosController;
use App\Http\Controllers\CacecobventasController;
use App\Http\Controllers\ComprobanteController;
use App\Http\Controllers\empleadoController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\pagoController;
use App\Http\Controllers\roleController;
use App\Http\Controllers\usuarioController;
use App\Models\comprobante;
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

Route::view('panel', 'panel.index')->name('panel');

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
Route::resource('/cacecobeirl/registrar/pago', CacecobpagosController::class)->names([
    'index' => 'cacecobpago.index',
    'create' => 'cacecobpago.create',
    'store' => 'cacecobpago.store',
    'show' => 'cacecobpago.show',
    'edit' => 'cacecobpago.edit',
    'update' => 'cacecobpago.update',
    'destroy' => 'cacecobpago.destroy',

]);


Route::resource('/cacecobeirl/registrar/clientes', CacecobClientesController::class);

Route::resource('/cacecobeirl/registrar/ventas', CacecobventasController::class)->names([
    'index' => 'cacecobventas.index',
    'create' => 'cacecobventas.create',
    'store' => 'cacecobventas.store',
    'show' => 'cacecobventas.show',
    'edit' => 'cacecobventas.edit',
    'update' => 'cacecobventas.update',
    'destroy' => 'cacecobventas.destroy',

]);;

Route::get('/cacecobeirl/registrar/comprobantes', function () {
    return view('asesor_cacecob.registro-comprobante-cacecob');
});





Route::resource('ciclos', academia_cicloController::class);
Route::resource('eventos', cacecob_eventoController::class);
Route::resource('empleados', empleadoController::class);
Route::resource('usuarios', usuarioController::class);
Route::resource('roles', roleController::class);
Route::resource('/impulsa/registrar/ventas', Academia_ventaController::class);
Route::resource('/impulsa/apoderados', ApoderadoController::class);
Route::resource('/impulsa/estudiantes', EstudianteController::class);
Route::resource('/impulsa/comprobantes', ComprobanteController::class);
Route::resource('/impulsa/detalle/pago', pagoController::class);
Route::get('/academiaimpulsa/clientes/registros', [Academia_ventaController::class, 'ventasAsesor'])->name('/impulsa/ventas');
Route::get('/academiaimpulsa/administrador/clientes/registros', [Academia_ventaController::class, 'ventasAsesorAdministrador'])->name('/impulsa/ventas/administrador');
Route::get('/academiaimpulsa/estudiante/registrar/comprobante/detalle/pago', [pagoController::class, 'registrarnuevopago'])->name('/impulsa/registrarnuevopago');
Route::get('/academiaimpulsa/buscar/estudiante/nuevo/comprobante/detalle/pago', [pagoController::class, 'registrarnuevopagoreinscripcion'])->name('/impulsa/registrarnuevopagoreinscripcion');
Route::get('/academiaimpulsa/buscar/estudiante/nueva/venta/reinscripcion', [Academia_ventaController::class, 'registrarventareincripcion'])->name('/impulsa/registrarventareincripcion');
Route::get('/academiaimpulsa/administrador/estatus', [Academia_ventaController::class, 'dashboard'])->name('/impulsa/administrador/ventaspormes');





Route::post('/academiaimpulsa/buscar/estudiante/informacion/pagos', [EstudianteController::class, 'busquedaEstudiante'])->name('busquedaEstudiante');
Route::post('/academiaimpulsa/buscar/estudiante/nueva/venta', [EstudianteController::class, 'buscarEstudiante'])->name('buscarEstudiante');




Route::get('/academiaimpulsa/home', function () {
    return view('asesor_impulsa.interfaz-principal-impulsa');
});

Route::get('/academiaimpulsa/buscar/estudiante/nuevo/comprobante', function () {
    return view('asesor_impulsa.registro-comprobante-reinscripcion');
});



Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/academiaimpulsa/estudiante/registrar/comprobante', function () {
    return view('pagos_impulsa.registrar-nuevo-comprobante');
});



//
Route::get('/academiaimpulsa/buscar/estudiante', function () {
    return view('pagos_impulsa.busqueda-estudiantes');
});



Route::get('/registros', function () {
    return view('registros.registros-impulsa');
});
Route::get('/404', function () {
    return view('pages.404');
});
