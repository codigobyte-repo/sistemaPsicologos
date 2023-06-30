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
        $this->pago->save();
    }

    public function pagoRechazado()
    {
        $this->pago->estado = 'rechazado';
        $this->pago->motivos = $this->motivos;
        $this->pago->save();
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
