<?php

namespace App\Http\Livewire\Admin\Motivo;

use App\Models\SituacionRevistaMotivo;
use Livewire\Component;

class EditSituacionRevistaMotivo extends Component
{
    public $motivo, $nombre;

    public function mount(SituacionRevistaMotivo $motivo)
    {
        $this->motivo = $motivo;
        $this->nombre = $motivo->nombre;
    }

    public function update()
    {
        $validatedData = $this->validate([
            'nombre' => 'required'
        ]);

        SituacionRevistaMotivo::where('id', $this->motivo->id)->update($validatedData);

        return redirect()->route('admin.revistas-motivos.index')->with('message', 'Los datos de la siatuación revista motivo se actualizaron correctamente.');
    }
    
    public function render()
    {
        return view('livewire.admin.motivo.edit-situacion-revista-motivo');
    }
}
