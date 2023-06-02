<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\MatriculadoController;

Route::get('', [HomeController::class, 'index']);

/* Funcionalidad para IMPORTAR EXCEL */
/* Deshabilitada para no pisar por equivocacion los datos que ya estan cargados */
/* Route::get('importarExcel', [MatriculadoController::class, 'importMatriculados']); */

Route::get('matriculados', [MatriculadoController::class, 'index'])->name('matriculados');