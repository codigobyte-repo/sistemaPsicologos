<?php

namespace App\Http\Livewire;

use App\Models\DatosDePago;
use App\Models\NotificacionesDePago;
use Livewire\Component;

class NavigationMenuAdmin extends Component
{
    public $nuevoPago = 0;

    public function render()
    {
        //Usamos el modelo para contar los nuevos anuncios de pagos en proceso
        $countEnProceso = DatosDePago::getCountEnProceso();
        
        return view('livewire.navigation-menu-admin', compact('countEnProceso'));
    }
}
