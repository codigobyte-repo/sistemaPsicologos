<?php

namespace App\Http\Controllers\Matriculados;

use App\Http\Controllers\Controller;
use App\Models\DatosDePago;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class MisPagosController extends Controller
{
    public function index()
    {
        return view('matriculados.mis-pagos.index');
    }

    public function show()
    {
        return view('matriculados.mis-pagos.show');
    }

    public function generarPdf($pagoId)
    {
        $pago = DatosDePago::with('user', 'matriculado')->find($pagoId);
        $pdf = Pdf::loadView('matriculados.mis-pagos.comprobante', compact('pago'));
        return $pdf->stream('comprobante.pdf');
    }
}
