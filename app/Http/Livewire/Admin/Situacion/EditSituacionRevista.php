<?php

namespace App\Http\Livewire\Admin\Situacion;

use App\Models\SituacionRevista;
use Livewire\Component;

class EditSituacionRevista extends Component
{
    public $revista, $nombre;

    public function mount(SituacionRevista $revista)
    {
        $this->revista = $revista;
        $this->nombre = $revista->nombre;
    }

    public function update()
    {
        $validatedData = $this->validate([
            'nombre' => 'required'
        ]);

        SituacionRevista::where('id', $this->revista->id)->update($validatedData);

        return redirect()->route('admin.revistas.index')->with('message', 'Los datos de la revista se actualizaron correctamente.');
    }

    public function render()
    {
        return view('livewire.admin.situacion.edit-situacion-revista');
    }
}
