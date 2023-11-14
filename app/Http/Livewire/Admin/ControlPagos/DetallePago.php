<?php

namespace App\Http\Livewire\Admin\ControlPagos;

use App\Models\Dato;
use App\Models\Factura;
use App\Models\Matriculado;
use App\Models\DatosDePago;
use Livewire\Component;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class DetallePago extends Component
{
    public $pago, $motivos;
    public $rechazar = false;

    public function mount($pagoId)
    {
        $this->pago = DatosDePago::find($pagoId);        
    }

    public function render()
    {
        return view('livewire.admin.control-pagos.detalle-pago');
    }

    public function aprobarPago()
    {
        $this->pago->estado = 'aprobado';
        /* pasamos visto a 1 para que la notificación solo se muestre una vez */
        $this->pago->visto = 1;
        $this->pago->save();

        return redirect()->route('control-pagos')->with('message', 'Comprobante de pago validado correctamente.');
    }

    public function pagoRechazado()
    {
        $this->pago->estado = 'rechazado';
        /* pasamos visto a 1 para que la notificación solo se muestre una vez */
        $this->pago->visto = 1;
        $this->pago->motivos = $this->motivos;
        $this->pago->save();
        return redirect()->route('control-pagos')->with('message', 'Comprobante de pago rechazado correctamente.');
    }

    public function rechazarPago()
    {
        $this->rechazar = true;    
    }

    public function cancelar()
    {
        $this->rechazar = false;    
    }
}
