<?php

namespace App\Http\Livewire\Matriculados;

use App\Models\Matriculado;
use Livewire\Component;

class MisDatos extends Component
{
    public function render()
    {
        $user_id = auth()->user()->id;
        $datos = Matriculado::where('user_id', $user_id)->first();
        return view('livewire.matriculados.mis-datos', compact('datos'));
    }
}
