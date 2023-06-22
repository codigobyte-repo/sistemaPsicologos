<?php

namespace App\Http\Livewire\Admin\Area;

use App\Models\Area;
use Livewire\Component;

class EditArea extends Component
{
    public $area, $name, $codigopostal;

    public function mount(Area $area)
    {
        $this->area = $area;
        $this->name = $area->name;
        $this->codigopostal = $area->codigopostal;
    }

    public function update()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'codigopostal' => 'required',
        ]);

        Area::where('id', $this->area->id)->update($validatedData);

        return redirect()->route('admin.areas.index')->with('message', 'Los datos del municipio se actualizaron correctamente.');
    }

    public function render()
    {
        return view('livewire.admin.area.edit-area');
    }
}
