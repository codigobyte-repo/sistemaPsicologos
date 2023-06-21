<?php

namespace App\Http\Livewire\Admin\University;

use App\Models\University;
use Livewire\Component;

class NewUniversity extends Component
{
    public $nombre, $direccion;

    public function render()
    {
        return view('livewire.admin.university.new-university');
    }

    public function createUniversidad()
    {
        $validatedData = $this->validate([
            'nombre' => 'required|string',
            'direccion' => 'nullable'
        ], [
            'nombre.required' => 'El campo nombre es obligatorio.',
            'direccion.required' => 'El campo dirección es obligatorio.'
        ]);

        $universidad = University::create([
            'nombre' => $validatedData['nombre'],
            'direccion' => $validatedData['direccion']
        ]);

        return redirect()->route('admin.universidades.index')->with('message', 'Universidad creada correctamente.');
    }
}
