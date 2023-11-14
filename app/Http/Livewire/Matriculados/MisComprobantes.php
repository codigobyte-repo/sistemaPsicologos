<?php

namespace App\Http\Livewire\Matriculados;

use App\Models\DatosDePago;
use Livewire\Component;

class MisComprobantes extends Component
{
    public function render()
    {
        $user_id = auth()->user()->id;
        $pagos = DatosDePago::where('user_id', $user_id)
                ->latest('created_at')
                ->limit(6)
                ->get();
        return view('livewire.matriculados.mis-comprobantes', compact('pagos'));
    }
}
