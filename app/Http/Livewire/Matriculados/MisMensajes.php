<?php

namespace App\Http\Livewire\Matriculados;

use App\Models\Message;
use Livewire\Component;

class MisMensajes extends Component
{
    public $mostrarCompleto = false;
    public $mensajeTruncado = 50;
    public $mensajesAmpliados = [];

    public function mount()
    {
        $mensajes = Message::where('to_user_id', auth()->user()->id)->with('user')->latest()->paginate(10);
        $this->mensajesAmpliados = array_fill_keys($mensajes->pluck('id')->toArray(), false);
    }

    public function render()
    {
        $mensajes = Message::where('to_user_id', auth()->user()->id)->with('user')->latest()->paginate(10);
        return view('livewire.matriculados.mis-mensajes', compact('mensajes'));
    }

    public function mostrarCompleto($mensajeId)
    {
        $this->mensajesAmpliados[$mensajeId] = true;
    }

    public function mostrarTruncado($mensajeId)
    {
        $this->mensajesAmpliados[$mensajeId] = false;
    }

}
