<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\MatriculadoController;
use App\Http\Controllers\Admin\UserController;

Route::get('dashboard', [HomeController::class, 'index'])->name('admin.dashboard');

/* Funcionalidad para IMPORTAR EXCEL */
/* Deshabilitada para no pisar por equivocación los datos que ya están cargados */
/* Route::get('importarExcel', [MatriculadoController::class, 'importMatriculados']); */

/* Matriculados */
Route::get('matriculados', [MatriculadoController::class, 'index'])->name('admin.matriculados');
Route::get('matriculados/create', [MatriculadoController::class, 'create'])->name('admin.matriculados.create');
Route::get('matriculados/form/{userId}', [MatriculadoController::class, 'form'])->name('admin.matriculados.form');
Route::get('matriculados/{matriculado}/edit', [MatriculadoController::class, 'edit'])->name('admin.matriculados.edit');

/* Usuarios */
Route::get('users', [UserController::class, 'index'])->name('admin.users.index');
Route::get('users/create', [UserController::class, 'create'])->name('admin.users.create');
Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
