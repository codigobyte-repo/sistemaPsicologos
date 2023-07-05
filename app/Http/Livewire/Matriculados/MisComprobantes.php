<?php

namespace App\Http\Livewire\Matriculados;

use App\Models\Factura;
use Livewire\Component;
use Barryvdh\DomPDF\Facade\Pdf;

class MisComprobantes extends Component
{
    public function render()
    {
        $user_id = auth()->user()->id;
        $facturas = Factura::where('user_id', $user_id)
                ->with('user', 'pago', 'dato', 'matriculado')
                ->latest('created_at')
                ->limit(6)
                ->get();
        return view('livewire.matriculados.mis-comprobantes', compact('facturas'));
    }
}
