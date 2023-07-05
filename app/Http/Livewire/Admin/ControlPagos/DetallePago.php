<?php

namespace App\Http\Livewire\Admin\ControlPagos;

use App\Models\Dato;
use App\Models\Factura;
use App\Models\Matriculado;
use App\Models\Pago;
use Livewire\Component;
use Carbon\Carbon;

class DetallePago extends Component
{
    public $pago, $motivos;
    public $rechazar = false;
    public $datoFizcal;

    public function mount(Pago $pago)
    {
        $this->pago = $pago;

        $this->datoFizcal = Dato::first();
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

        $matriculado_id = Matriculado::where('user_id', $this->pago->user_id)->value('id');

        Factura::create([
            'pago_id' => $this->pago->id,
            'user_id' => $this->pago->user_id,
            'dato_id' => $this->datoFizcal->id,
            'matriculado_id' => $matriculado_id,
            'numero_factura' => 1,
            'fecha_emision' => Carbon::now()->format('Y-m-d'),
        ]);

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
