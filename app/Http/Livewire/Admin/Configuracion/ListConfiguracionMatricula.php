<?php

namespace App\Http\Livewire\Admin\Configuracion;

use App\Models\ConfiguracionMatricula as ModelsConfiguracionMatricula;
use Livewire\Component;

class ListConfiguracionMatricula extends Component
{
    public function render()
    {
        $configuraciones = ModelsConfiguracionMatricula::all();
        return view('livewire.admin.configuracion.index', compact('configuraciones'));
    }
}
