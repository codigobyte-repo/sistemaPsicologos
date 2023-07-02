<?php

namespace App\Http\Livewire;

use App\Models\Pago;
use Illuminate\Support\Facades\Event;
use Livewire\Component;

class Notifications extends Component
{

    public function render()
    {
        $estadoPago = Pago::where('user_id', auth()->user()->id)->select('estado', 'motivos', 'visto')->first();

        return view('livewire.notifications', compact('estadoPago'));
    }
}
