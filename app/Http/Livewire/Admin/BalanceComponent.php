<?php

namespace App\Http\Livewire\Admin;

use App\Models\DatosDePago;
use Livewire\Component;

class BalanceComponent extends Component
{
    /* public $balancePorEstado; */
    public $aprobados, $en_proceso, $rechazados;

    public function mount()
    {
        /* $this->calcularBalancePorEstado(); */
        $this->aprobados = DatosDePago::contarRegistrosPorEstado('aprobado');
        $this->en_proceso = DatosDePago::contarRegistrosPorEstado('en_proceso');
        $this->rechazados = DatosDePago::contarRegistrosPorEstado('rechazados');
    }

    /* public function calcularBalancePorEstado()
    {
        $this->balancePorEstado = DatosDePago::getBalancePorEstado();
    } */
    
    public function render()
    {
        return view('livewire.admin.balance-component');
    }
}
