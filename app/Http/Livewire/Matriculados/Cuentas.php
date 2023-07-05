<?php

namespace App\Http\Livewire\Matriculados;

use App\Models\ConfiguracionMatricula;
use App\Models\Pago;
use Carbon\Carbon;
use Livewire\Component;

class Cuentas extends Component
{
    public function render()
    {
        $userPagos = Pago::where('user_id', auth()->user()->id)
            ->where('estado', 'rechazado')
            ->latest()
            ->get();

        return view('livewire.matriculados.cuentas', [
            'userPagos' => $userPagos
        ]);
    }
}
