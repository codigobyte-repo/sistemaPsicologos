<?php

namespace App\Http\Livewire\Admin\PrecioServicios;

use App\Models\precio_servicio;
use Livewire\Component;

class ListPrecios extends Component
{
    public function render()
    {
        $precios = precio_servicio::all();
        return view('livewire.admin.precio-servicios.list-precios', compact('precios'));
    }
}
