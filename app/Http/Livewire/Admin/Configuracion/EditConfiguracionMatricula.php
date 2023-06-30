<?php

namespace App\Http\Livewire\Admin\Configuracion;

use App\Models\ConfiguracionMatricula;
use Livewire\Component;

class EditConfiguracionMatricula extends Component
{
    public $configuracion, $precio_matricula, $fecha_vencimiento, $fecha_segundo_vencimiento, $recargo_despues_vencimiento;
    

    public function mount(ConfiguracionMatricula $configuracion)
    {
        // Formatear el precio de la matrícula
        $this->formatPrecioMatricula($configuracion->precio_matricula);
        // Formatear la fecha de vencimiento
        $this->formatFechaVencimiento($configuracion->fecha_vencimiento);
        // Formatear la fecha del segundo vencimiento
        $this->formatFechaSegundoVencimiento($configuracion->fecha_segundo_vencimiento);
        // Formatear el recargo después del vencimiento
        $this->formatRecargoDespuesVencimiento($configuracion->recargo_despues_vencimiento);
    }

    private function formatPrecioMatricula($precio)
    {
        // Aplicar el formato numérico al precio de la matrícula
        $this->precio_matricula = number_format($precio, 0, ',', '');
    }

    private function formatFechaVencimiento($fecha)
    {
        // Formatear la fecha de vencimiento en el formato deseado
        $this->fecha_vencimiento = $fecha ? \Carbon\Carbon::createFromFormat('Y-m-d', $fecha)->format('d/m/Y') : null;
    }

    private function formatFechaSegundoVencimiento($fecha)
    {
        // Formatear la fecha del segundo vencimiento en el formato deseado
        $this->fecha_segundo_vencimiento = $fecha ? \Carbon\Carbon::createFromFormat('Y-m-d', $fecha)->format('d/m/Y') : null;
    }

    private function formatRecargoDespuesVencimiento($recargo)
    {
        // Aplicar el formato numérico al recargo después del vencimiento
        $this->recargo_despues_vencimiento = number_format($recargo, 0, ',', '.');
    }


    public function render()
    {
        return view('livewire.admin.configuracion.edit-configuracion-matricula');
    }

    public function updateConfiguracion()
    {

        $validatedData = $this->validate([
            'precio_matricula' => 'required',
            'fecha_vencimiento' => 'required',
            'fecha_segundo_vencimiento' => 'required',
            'recargo_despues_vencimiento' => 'required|numeric|min:1|max:100'
        ], [
            'precio_matricula.required' => 'El precio de la matrícula es requerido',
            'fecha_vencimiento.required' => 'La fecha del primer vencimiento es requerido',
            'fecha_segundo_vencimiento.required' => 'El precio de la matrícula es requerido',
            'recargo_despues_vencimiento.required' => 'La fecha del segundo vencimiento es requerido'
        ]);

        // Formatear los datos antes de guardarlos
        $formattedData = [
            'precio_matricula' => str_replace(',', '.', str_replace('.', '', $validatedData['precio_matricula'])),
            'fecha_vencimiento' => \Carbon\Carbon::createFromFormat('d/m/Y', $validatedData['fecha_vencimiento'])->format('Y-m-d'),
            'fecha_segundo_vencimiento' => \Carbon\Carbon::createFromFormat('d/m/Y', $validatedData['fecha_segundo_vencimiento'])->format('Y-m-d'),
            'recargo_despues_vencimiento' => str_replace(',', '.', str_replace('.', '', $validatedData['recargo_despues_vencimiento']))
        ];

        ConfiguracionMatricula::where('id', $this->configuracion->id)->update($formattedData);

        return redirect()->route('admin.configuracion-matricula.index')->with('message', 'La configuración se ha actualizado correctamente.');
    }
}
