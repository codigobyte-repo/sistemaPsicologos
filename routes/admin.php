<?php

use App\Http\Controllers\Admin\ControlPagos;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\MatriculadoController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\ConfiguracionMatriculaController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\SituacionRevistaController;
use App\Http\Controllers\SituacionRevistaMotivoController;
use App\Http\Controllers\UniversityController;

Route::get('dashboard', [HomeController::class, 'index'])->middleware('can:admin.dashboard')->name('admin.dashboard');

/* Funcionalidad para IMPORTAR EXCEL */
/* Deshabilitada para no pisar por equivocación los datos que ya están cargados */
/* Route::get('importarExcel', [MatriculadoController::class, 'importMatriculados'])->middleware('can:importMatriculados'); */

/* Matriculados */
Route::get('matriculados', [MatriculadoController::class, 'index'])->middleware('can:admin.matriculados.index')->name('admin.matriculados');
Route::get('matriculados/create', [MatriculadoController::class, 'create'])->middleware('can:admin.matriculados.create')->name('admin.matriculados.create');
Route::get('matriculados/form/{userId}', [MatriculadoController::class, 'form'])->middleware('can:admin.matriculados.form')->name('admin.matriculados.form');
Route::get('matriculados/{matriculado}/edit', [MatriculadoController::class, 'edit'])->middleware('can:admin.matriculados.index')->name('admin.matriculados.edit');

/* Usuarios */
Route::get('users', [UserController::class, 'index'])->middleware('can:admin.users.index')->name('admin.users.index');
Route::get('users/create', [UserController::class, 'create'])->middleware('can:admin.users.create')->name('admin.users.create');
Route::get('users/{user}/edit', [UserController::class, 'edit'])->middleware('can:admin.users.edit')->name('admin.users.edit');

/* Roles */
Route::resource('roles', RoleController::class)->names('admin.roles');

/* Universidades */
Route::get('universidades', [UniversityController::class, 'index'])->middleware('can:admin.universidades.index')->name('admin.universidades.index');
Route::get('universidades/create', [UniversityController::class, 'create'])->middleware('can:admin.universidades.create')->name('admin.universidades.create');
Route::get('universidades/{university}/edit', [UniversityController::class, 'edit'])->middleware('can:admin.universidades.edit')->name('admin.universidades.edit');

/* Localidades */
Route::get('localidades', [LocationController::class, 'index'])->middleware('can:admin.localidades.index')->name('admin.localidades.index');
Route::get('localidades/create', [LocationController::class, 'create'])->middleware('can:admin.localidades.create')->name('admin.localidades.create');
Route::get('localidades/{localidad}/edit', [LocationController::class, 'edit'])->middleware('can:admin.localidades.edit')->name('admin.localidades.edit');

/* Areas */
Route::get('areas', [AreaController::class, 'index'])->middleware('can:admin.areas.index')->name('admin.areas.index');
Route::get('areas/create', [AreaController::class, 'create'])->middleware('can:admin.areas.create')->name('admin.areas.create');
Route::get('areas/{area}/edit', [AreaController::class, 'edit'])->middleware('can:admin.areas.edit')->name('admin.areas.edit');

/* Situacion Revistas */
Route::get('revistas', [SituacionRevistaController::class, 'index'])->middleware('can:admin.revistas.index')->name('admin.revistas.index');
Route::get('revistas/create', [SituacionRevistaController::class, 'create'])->middleware('can:admin.revistas.create')->name('admin.revistas.create');
Route::get('revistas/{revista}/edit', [SituacionRevistaController::class, 'edit'])->middleware('can:admin.revistas.edit')->name('admin.revistas.edit');

/* Situacion Revistas Motivos */
Route::get('revistas-motivos', [SituacionRevistaMotivoController::class, 'index'])->middleware('can:admin.revistas-motivos.index')->name('admin.revistas-motivos.index');
Route::get('revistas-motivos/create', [SituacionRevistaMotivoController::class, 'create'])->middleware('can:admin.revistas-motivos.create')->name('admin.revistas-motivos.create');
Route::get('revistas-motivos/{motivo}/edit', [SituacionRevistaMotivoController::class, 'edit'])->middleware('can:admin.revistas-motivos.edit')->name('admin.revistas-motivos.edit');

/* Configuración Matriculas */
Route::get('configuracion-matricula', [ConfiguracionMatriculaController::class, 'index'])->middleware('can:admin.configuracion-matricula')->name('admin.configuracion-matricula.index');
Route::get('configuracion-matricula/{configuracion}/edit', [ConfiguracionMatriculaController::class, 'edit'])->middleware('can:admin.configuracion-matricula.edit')->name('admin.configuracion-matricula.edit');

/* Control de pagos */
Route::get('control-pagos', [ControlPagos::class, 'index'])->middleware('can:admin.control-pagos.index')->name('control-pagos');
Route::get('control-pagos/{pago}/edit', [ControlPagos::class, 'edit'])->middleware('can:admin.control-pagos.edit')->name('admin.control-pagos.edit');
Route::get('comprobantes', [ControlPagos::class, 'verComprobantes'])->middleware('can:admin.comprobantes')->name('admin.comprobantes');
Route::get('/generar-pdf/{facturaId}', [ControlPagos::class, 'generarPdf'])->middleware('can:admin.generar-pdf')->name('admin.generarPdf');

/* Mensajes */
Route::get('messages', [MessageController::class, 'index'])->name('admin.messages.index');
Route::post('messages', [MessageController::class, 'store'])->name('admin.messages.store');
