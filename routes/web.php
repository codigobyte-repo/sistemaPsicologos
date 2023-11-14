<?php

use App\Http\Controllers\AnuncioPagos;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Matriculados\MisPagosController;
use App\Http\Controllers\MessageController;
use App\Http\Livewire\Matriculados\Cuentas;
use App\Http\Livewire\Matriculados\MisDatos;
use App\Models\DatosDePago;
use App\Models\Pago;
use Illuminate\Support\Facades\Route;

Route::view('/', 'auth.login');

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
    Route::get('mis-comprobantes', [MisPagosController::class, 'show'])->name('mis-comprobantes');
    Route::get('/generar-pdf/{pagoId}', [MisPagosController::class, 'generarPdf']);
    Route::get('/mis-datos', MisDatos::class)->name('mis-datos');
    Route::get('/cuentas', Cuentas::class)->name('cuentas');
    Route::get('messages/{message}', [MessageController::class, 'show'])->name('messages.show');
    
    Route::get('anuncio-pagos', [AnuncioPagos::class, 'index'])->name('anuncio-pagos');
    Route::post('cargar-comprobante', [AnuncioPagos::class, 'cargarComprobante'])->name('cargar-comprobante');

});

Route::post('/marcar-como-visto', function () {
    $estadoPago = DatosDePago::where('user_id', auth()->user()->id)
                ->orderBy('created_at', 'desc')
                ->first();
    if($estadoPago){
        $estadoPago->visto = 0;
        $estadoPago->save();
    }
});

Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index'])->middleware('can:admin.dashboard');
