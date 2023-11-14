<?php

namespace App\Http\Livewire;

use App\Models\NotificacionesDePago;
use Livewire\Component;

class NavigationMenuAdmin extends Component
{
    public $nuevoPago = 0;

    public function render()
    {
        if ($this->nuevoPago == 0) {
            $nuevosRegistros = NotificacionesDePago::where('visto', 1)->count();

            if ($nuevosRegistros > 0) {
                $this->nuevoPago = $nuevosRegistros;
            }
        }
        return view('livewire.navigation-menu-admin');
    }
}
