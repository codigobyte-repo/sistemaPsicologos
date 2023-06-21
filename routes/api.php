<?php

use App\Http\Controllers\SelectController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/distritos-matriculas', [SelectController::class, 'distritosMatriculas'])->name('api.distritos-matriculas');
Route::get('/distritos-revistas', [SelectController::class, 'distritosRevistas'])->name('api.distritos-revistas');
Route::get('/situaciones-revistas', [SelectController::class, 'situacionesRevistas'])->name('api.situaciones-revistas');
Route::get('/motivos-situacion-revista', [SelectController::class, 'motivosSituacionRevista'])->name('api.motivos-situacion-revista');
Route::get('/nationalities', [SelectController::class, 'nationalities'])->name('api.nationalities');
Route::get('/titulos-universitarios', [SelectController::class, 'titulosUniversitarios'])->name('api.titulos-universitarios');
Route::get('/universities', [SelectController::class, 'universities'])->name('api.universities');

Route::get('/localidades', [SelectController::class, 'localidades'])->name('api.localidades');
Route::get('/municipios', [SelectController::class, 'municipios'])->name('api.municipios');


