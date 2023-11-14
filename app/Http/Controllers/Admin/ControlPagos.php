<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Factura;
use App\Models\DatosDePago;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ControlPagos extends Controller
{
    public function index()
    {
        return view('admin.control-pagos.index');
    }

    public function edit(DatosDePago $pago)
    {
        return view('admin.control-pagos.edit', compact('pago'));
    }

    public function verComprobantes()
    {
        return view('admin.control-pagos.verComprobantes');
    }

    public function generarPdf($facturaId)
    {
        $factura = Factura::with('user', 'pago', 'dato', 'matriculado')->find($facturaId);
        $pdf = Pdf::loadView('matriculados.mis-pagos.comprobante', compact('factura'));
        return $pdf->stream('comprobante.pdf');
    }
}
