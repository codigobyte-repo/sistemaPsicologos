<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\MatriculadoController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\SituacionRevistaController;
use App\Http\Controllers\SituacionRevistaMotivoController;
use App\Http\Controllers\UniversityController;

Route::get('dashboard', [HomeController::class, 'index'])->name('admin.dashboard');

/* Funcionalidad para IMPORTAR EXCEL */
/* Deshabilitada para no pisar por equivocación los datos que ya están cargados */
Route::get('importarExcel', [MatriculadoController::class, 'importMatriculados']);

/* Matriculados */
Route::get('matriculados', [MatriculadoController::class, 'index'])->name('admin.matriculados');
Route::get('matriculados/create', [MatriculadoController::class, 'create'])->name('admin.matriculados.create');
Route::get('matriculados/form/{userId}', [MatriculadoController::class, 'form'])->name('admin.matriculados.form');
/* Route::get('matriculados/{matriculado}/edit', [MatriculadoController::class, 'edit'])->name('admin.matriculados.edit'); */

/* Usuarios */
Route::get('users', [UserController::class, 'index'])->name('admin.users.index');
Route::get('users/create', [UserController::class, 'create'])->name('admin.users.create');
Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');

/* Universidades */
Route::get('universidades', [UniversityController::class, 'index'])->name('admin.universidades.index');
Route::get('universidades/create', [UniversityController::class, 'create'])->name('admin.universidades.create');
Route::get('universidades/{university}/edit', [UniversityController::class, 'edit'])->name('admin.universidades.edit');

/* Localidades */
Route::get('localidades', [LocationController::class, 'index'])->name('admin.localidades.index');
Route::get('localidades/create', [LocationController::class, 'create'])->name('admin.localidades.create');
Route::get('localidades/{localidad}/edit', [LocationController::class, 'edit'])->name('admin.localidades.edit');

/* Areas */
Route::get('areas', [AreaController::class, 'index'])->name('admin.areas.index');
Route::get('areas/create', [AreaController::class, 'create'])->name('admin.areas.create');
Route::get('areas/{area}/edit', [AreaController::class, 'edit'])->name('admin.areas.edit');

/* Situacion Revistas */
Route::get('revistas', [SituacionRevistaController::class, 'index'])->name('admin.revistas.index');
Route::get('revistas/create', [SituacionRevistaController::class, 'create'])->name('admin.revistas.create');
Route::get('revistas/{revista}/edit', [SituacionRevistaController::class, 'edit'])->name('admin.revistas.edit');

/* Situacion Revistas Motivos */
Route::get('revistas-motivos', [SituacionRevistaMotivoController::class, 'index'])->name('admin.revistas-motivos.index');
Route::get('revistas-motivos/create', [SituacionRevistaMotivoController::class, 'create'])->name('admin.revistas-motivos.create');
Route::get('revistas-motivos/{motivo}/edit', [SituacionRevistaMotivoController::class, 'edit'])->name('admin.revistas-motivos.edit');