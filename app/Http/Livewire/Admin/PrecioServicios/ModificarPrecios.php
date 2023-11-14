<?php

namespace App\Http\Livewire\Admin\PrecioServicios;

use App\Models\precio_servicio;
use Livewire\Component;

class ModificarPrecios extends Component
{
    public $precio;
    public $precioA, $precioB, $precioC, $precioFid, $multa, $habilitaciones, $supervisiones_menos_5_anos, $supervisiones_mas_5_anos, $supervisiones_forenses;

    public function mount(precio_servicio $precio)
    {
        $this->precio = $precio;
        $this->precioA = number_format($precio->matricula_actual_categoria_a, 0, ',', '.');
        $this->precioB = number_format($precio->matricula_actual_categoria_b, 0, ',', '.');
        $this->precioC = number_format($precio->matricula_actual_categoria_c, 0, ',', '.');
        $this->precioFid = number_format($precio->matricula_actual_fid, 0, ',', '.');
        $this->multa = number_format($precio->multa, 0, ',', '.');
        $this->habilitaciones = number_format($precio->habilitaciones, 0, ',', '.');
        $this->supervisiones_menos_5_anos = number_format($precio->supervisiones_menos_5_anos, 0, ',', '.');
        $this->supervisiones_mas_5_anos = number_format($precio->supervisiones_mas_5_anos, 0, ',', '.');
        $this->supervisiones_forenses = number_format($precio->supervisiones_forenses, 0, ',', '.');
    }
    
    public function render()
    {
        return view('livewire.admin.precio-servicios.modificar-precios');
    }

    public function updatePrecio()
    {
        $validatedData = $this->validate([
            'precioA' => 'nullable|numeric',
            'precioB' => 'nullable|numeric',
            'precioC' => 'nullable|numeric',
            'precioFid' => 'nullable|numeric',
            'multa' => 'nullable|numeric',
            'habilitaciones' => 'nullable|numeric',
            'supervisiones_menos_5_anos' => 'nullable|numeric',
            'supervisiones_mas_5_anos' => 'nullable|numeric',
            'supervisiones_forenses' => 'nullable|numeric',
        ], [
            'precioA.numeric' => 'El valor debe ser numérico',
            'precioB.numeric' => 'El valor debe ser numérico',
            'precioC.numeric' => 'El valor debe ser numérico',
            'precioFid.numeric' => 'El valor debe ser numérico',
            'multa.numeric' => 'El valor debe ser numérico',
            'habilitaciones.numeric' => 'El valor debe ser numérico',
            'supervisiones_menos_5_anos.numeric' => 'El valor debe ser numérico',
            'supervisiones_mas_5_anos.numeric' => 'El valor debe ser numérico',
            'supervisiones_forenses.numeric' => 'El valor debe ser numérico',
        ]);

        $precio = precio_servicio::find($this->precio->id);
        $precio->matricula_actual_categoria_a = $validatedData['precioA'];
        $precio->matricula_actual_categoria_b = $validatedData['precioB'];
        $precio->matricula_actual_categoria_c = $validatedData['precioC'];
        $precio->matricula_actual_fid = $validatedData['precioFid'];
        $precio->multa = $validatedData['multa'];
        $precio->habilitaciones = $validatedData['habilitaciones'];
        $precio->supervisiones_menos_5_anos = $validatedData['supervisiones_menos_5_anos'];
        $precio->supervisiones_mas_5_anos = $validatedData['supervisiones_mas_5_anos'];
        $precio->supervisiones_forenses = $validatedData['supervisiones_forenses'];
        $precio->save();

        return redirect()->route('admin.precio-servicios')->with('message', 'La configuración se ha actualizado correctamente.');
    
    }
}
