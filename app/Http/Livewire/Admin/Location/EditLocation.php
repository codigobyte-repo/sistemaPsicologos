<?php

namespace App\Http\Livewire\Admin\Location;

use App\Models\Location;
use Livewire\Component;

class EditLocation extends Component
{
    public $localidad, $location, $codigo31662;

    public function mount(Location $localidad)
    {
        $this->localidad = $localidad;
        $this->location = $localidad->location;
        $this->codigo31662 = $localidad->codigo31662;
    }

    public function update()
    {
        $validatedData = $this->validate([
            'location' => 'required',
            'codigo31662' => 'required',
        ]);

        Location::where('id', $this->localidad->id)->update($validatedData);

        return redirect()->route('admin.localidades.index')->with('message', 'Los datos de la localidad se actualizaron correctamente.');
    }

    public function render()
    {
        return view('livewire.admin.location.edit-location');
    }
}
