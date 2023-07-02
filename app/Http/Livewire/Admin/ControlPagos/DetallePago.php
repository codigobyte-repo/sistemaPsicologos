<?php

namespace App\Http\Livewire\Admin\ControlPagos;

use App\Models\Pago;
use Livewire\Component;

class DetallePago extends Component
{
    public $pago, $motivos;
    public $rechazar = false;

    public function mount(Pago $pago)
    {
        $this->pago = $pago;
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
