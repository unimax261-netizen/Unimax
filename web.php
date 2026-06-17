<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SolicitudController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\EmpleadoController;

/*
|--------------------------------------------------------------------------
| PÁGINAS PÚBLICAS
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/login', function () {
    return view('login');
});

/*
|--------------------------------------------------------------------------
| PANEL CLIENTE
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/cliente', function () {
        return view('cliente.dashboard');
    });

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware('verified')->name('dashboard');

    Route::post('/solicitudes/guardar', [SolicitudController::class, 'store'])
        ->name('solicitudes.guardar');

    Route::get('/mis-servicios', [SolicitudController::class, 'misServicios'])
        ->name('mis.servicios');
     
    Route::post('/cliente/calificar',
    [SolicitudController::class,'calificar'])
    ->name('cliente.calificar');
     
    Route::post('/cliente/calificar',
    [SolicitudController::class,'calificar'])
    ->name('cliente.calificar');
    
    /*
    | PERFIL
    */

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| PANEL ADMINISTRADOR
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])
        ->name('admin.dashboard');

    Route::get('/admin/usuarios', [AdminController::class, 'usuarios'])
        ->name('admin.usuarios');

    Route::get('/admin/solicitudes', [AdminController::class, 'solicitudes'])
        ->name('admin.solicitudes');

    Route::get('/admin/reportes', [AdminController::class, 'reporteServicios'])
        ->name('admin.reportes');

    Route::get('/admin/pdf/usuarios', [AdminController::class, 'usuariosPDF'])
        ->name('admin.pdf.usuarios');

    Route::get('/admin/reporte/categoria', [AdminController::class, 'reporteCategoria'])
        ->name('admin.reporte.categoria');

    Route::get('/admin/reporte/pdf', [AdminController::class, 'reportePDF'])
        ->name('admin.reporte.pdf');

    Route::get('/admin/gestion-usuarios', [AdminController::class, 'gestionUsuarios'])
    ->name('admin.gestion.usuarios');

Route::get('/admin/crear-usuario', [AdminController::class, 'crearUsuario'])
    ->name('admin.crear.usuario');

Route::post('/admin/guardar-usuario', [AdminController::class, 'guardarUsuario'])
    ->name('admin.guardar.usuario');

Route::get('/admin/usuario/{id}/editar', [AdminController::class, 'editarUsuario'])
    ->name('admin.editar.usuario');

Route::put('/admin/usuario/{id}/actualizar', [AdminController::class, 'actualizarUsuario'])
    ->name('admin.actualizar.usuario');

Route::put('/admin/usuario/{id}/estado', [AdminController::class, 'cambiarEstadoUsuario'])
    ->name('admin.estado.usuario');

    /*
    | ASIGNAR EMPLEADO 
    */

    Route::get('/admin/asignar/{id}', [AdminController::class, 'asignarEmpleado'])
        ->name('admin.asignar.empleado');

    Route::post('/admin/solicitud/{id}/guardar', [AdminController::class, 'guardarAsignacion'])
        ->name('admin.guardar.asignacion');
});

/*
| PANEL EMPLEADO
*/

Route::middleware('auth')->group(function () {

    Route::get('/empleado', [EmpleadoController::class, 'dashboard'])
        ->name('empleado.dashboard');

    Route::get('/empleado/perfil', [EmpleadoController::class, 'perfil'])
        ->name('empleado.perfil');

    Route::get('/empleado/solicitudes', [EmpleadoController::class, 'solicitudes'])
        ->name('empleado.solicitudes');

    Route::get('/empleado/historial', [EmpleadoController::class, 'historial'])
        ->name('empleado.historial');

    Route::post(
    '/empleado/categoria',
    [EmpleadoController::class, 'actualizarCategoria']
)->name('empleado.actualizarCategoria');

Route::post('/empleado/aceptar/{id}',
    [EmpleadoController::class,'aceptarServicio']
)->name('empleado.aceptar');

Route::post('/empleado/rechazar/{id}',
    [EmpleadoController::class,'rechazarServicio']
)->name('empleado.rechazar');

Route::post('/empleado/finalizar/{id}',
    [EmpleadoController::class,'finalizarServicio']
)->name('empleado.finalizar');
    
Route::post('/empleado/subir-foto', [EmpleadoController::class, 'subirFoto'])
    ->name('empleado.subirFoto');
});

/*
|--------------------------------------------------------------------------
| CATEGORÍAS
|--------------------------------------------------------------------------
*/

Route::resource('categorias', CategoriaController::class);

/*
|--------------------------------------------------------------------------
| AUTH BREEZE
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';