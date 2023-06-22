<?php

namespace App\Http\Livewire\Admin\Area;

use App\Models\Area;
use App\Models\Location;
use Livewire\Component;

class NewArea extends Component
{
    public $name, $codigopostal, $location_id;

    public function createArea()
    {
        $validatedData = $this->validate([
            'name' => 'required|string',
            'codigopostal' => 'required',
            'location_id' => 'required',
        ], [
            'name.required' => 'El campo área es obligatorio.',
            'codigopostal.required' => 'El campo código postal es obligatorio.',
            'location_id.required' => 'El campo localidad es obligatorio.'
        ]);

        $area = Area::create([
            'name' => $validatedData['name'],
            'codigopostal' => $validatedData['codigopostal'],
            'location_id' => $validatedData['location_id']
        ]);

        return redirect()->route('admin.areas.index')->with('message', 'Municipio creada correctamente.');
    }

    public function render()
    {
        return view('livewire.admin.area.new-area');
    }
}
