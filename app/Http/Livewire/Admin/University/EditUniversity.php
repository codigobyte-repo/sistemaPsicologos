<?php

namespace App\Http\Livewire\Admin\University;

use App\Models\University;
use Livewire\Component;

class EditUniversity extends Component
{
    public $university, $nombre, $direccion;

    public function mount(University $university)
    {
        $this->university = $university;
        $this->nombre = $university->nombre;
        $this->direccion = $university->direccion;
    }

    public function update()
    {
        $validatedData = $this->validate([
            'nombre' => 'required',
            'direccion' => 'nullable',
        ]);

        University::where('id', $this->university->id)->update($validatedData);

        return redirect()->route('admin.universidades.index')->with('message', 'Los datos de la universidad se actualizaron correctamente.');
    }

    public function render()
    {
        return view('livewire.admin.university.edit-university');
    }
}
