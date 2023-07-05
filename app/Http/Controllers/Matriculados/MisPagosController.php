<?php

namespace App\Http\Controllers\Matriculados;

use App\Http\Controllers\Controller;
use App\Models\Factura;
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

    public function generarPdf($facturaId)
    {
        $factura = Factura::with('user', 'pago', 'dato', 'matriculado')->find($facturaId);
        $pdf = Pdf::loadView('matriculados.mis-pagos.comprobante', compact('factura'));
        return $pdf->stream('comprobante.pdf');
    }
}
