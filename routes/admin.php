<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\MatriculadoController;

Route::get('dashboard', [HomeController::class, 'index'])->name('admin.dashboard');

/* Funcionalidad para IMPORTAR EXCEL */
/* Deshabilitada para no pisar por equivocación los datos que ya están cargados */
Route::get('importarExcel', [MatriculadoController::class, 'importMatriculados']);


Route::get('matriculados', [MatriculadoController::class, 'index'])->name('admin.matriculados');
Route::get('matriculados/create', [MatriculadoController::class, 'create'])->name('admin.matriculados.create');
Route::get('matriculados/form/{userId}', [MatriculadoController::class, 'form'])->name('admin.matriculados.form');
