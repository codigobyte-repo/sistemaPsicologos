<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Matriculados\MisPagosController;
use App\Models\Pago;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    /* Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard'); */
});

Route::middleware(['auth'])->group(function () {

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('mis-pagos', [MisPagosController::class, 'index'])->name('mis-pagos');

});

Route::post('/marcar-como-visto', function () {
    $estadoPago = Pago::where('user_id', auth()->user()->id)->first();
    $estadoPago->visto = 0;
    $estadoPago->save();
});

/* Route::get('/session-expired', function () {
    return view('session-expired');
})->middleware('auth')->name('session-expired'); */
/* Route::get('/session-expired', function () {
    return view('session-expired');
})->name('session-expired'); */
