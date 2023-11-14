<?php

namespace App\Http\Livewire\Matriculados;

use App\Models\ConfiguracionMatricula;
use App\Models\DatosDePago;
use App\Models\Pago;
use Carbon\Carbon;
use Livewire\Component;

class Cuentas extends Component
{
    public function render()
    {
        $userPagos = DatosDePago::where('user_id', auth()->user()->id)
            ->where('estado', 'rechazado')
            ->where('visto', 1)
            ->latest()
            ->get();

        foreach ($userPagos as $pago) {
            if ($pago->estado == 'rechazado' && $pago->visto == 1) {
                $pago->visto = 0;
                $pago->save();
            }
        }
        


        return view('livewire.matriculados.cuentas', [
            'userPagos' => $userPagos
        ]);
    }
}
