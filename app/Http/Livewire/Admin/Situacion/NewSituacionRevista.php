<?php

namespace App\Http\Livewire\Admin\Situacion;

use App\Models\SituacionRevista;
use Livewire\Component;

class NewSituacionRevista extends Component
{
    public $nombre;

    public function render()
    {
        return view('livewire.admin.situacion.new-situacion-revista');
    }

    public function createRevista()
    {
        $validatedData = $this->validate([
            'nombre' => 'required|string',
        ], [
            'nombre.required' => 'El campo nombre es obligatorio.',
        ]);

        $universidad = SituacionRevista::create([
            'nombre' => $validatedData['nombre'],
        ]);

        return redirect()->route('admin.revistas.index')->with('message', 'Situación revista creada correctamente.');
    }
}
