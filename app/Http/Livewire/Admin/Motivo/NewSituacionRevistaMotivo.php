<?php

namespace App\Http\Livewire\Admin\Motivo;

use App\Models\SituacionRevistaMotivo;
use Livewire\Component;

class NewSituacionRevistaMotivo extends Component
{
    public $nombre;

    public function render()
    {
        return view('livewire.admin.motivo.new-situacion-revista-motivo');
    }

    public function createRevistaMotivo()
    {
        $validatedData = $this->validate([
            'nombre' => 'required|string',
        ], [
            'nombre.required' => 'El campo nombre es obligatorio.',
        ]);

        $universidad = SituacionRevistaMotivo::create([
            'nombre' => $validatedData['nombre'],
        ]);

        return redirect()->route('admin.revistas-motivos.index')->with('message', 'Situación revista motivos creada correctamente.');
    }
}
