<?php

namespace App\Http\Livewire\Admin\Location;

use App\Models\Location;
use Livewire\Component;

class NewLocation extends Component
{
    public $location, $codigo31662;

    public function render()
    {
        return view('livewire.admin.location.new-location');
    }

    public function createLocalidad()
    {
        $validatedData = $this->validate([
            'location' => 'required|string',
            'codigo31662' => 'required'
        ], [
            'location.required' => 'El campo localidad es obligatorio.',
            'codigo31662.required' => 'El campo código es obligatorio.'
        ]);

        $localidad = Location::create([
            'location' => $validatedData['location'],
            'codigo31662' => $validatedData['codigo31662']
        ]);

        return redirect()->route('admin.localidades.index')->with('message', 'Localidad creada correctamente.');
    }
}
