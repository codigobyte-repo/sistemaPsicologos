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

Route::get('/api/distritos-matriculas', [SelectController::class, 'distritosMatriculas'])->name('api.distritos-matriculas');
Route::get('/api/distritos-revistas', [SelectController::class, 'distritosRevistas'])->name('api.distritos-revistas');
Route::get('/api/situaciones-revistas', [SelectController::class, 'situacionesRevistas'])->name('api.situaciones-revistas');
Route::get('/api/motivos-situacion-revista', [SelectController::class, 'motivosSituacionRevista'])->name('api.motivos-situacion-revista');
Route::get('/api/nationalities', [SelectController::class, 'nationalities'])->name('api.nationalities');
Route::get('/api/titulos-universitarios', [SelectController::class, 'titulosUniversitarios'])->name('api.titulos-universitarios');
Route::get('/api/universities', [SelectController::class, 'universities'])->name('api.universities');

Route::get('/api/localidades', [SelectController::class, 'localidades'])->name('api.localidades');
Route::get('/api/municipios', [SelectController::class, 'municipios'])->name('api.municipios');


