<?php

namespace App\Http\Livewire\Matriculados;

use Livewire\Component;
use App\Models\ConfiguracionMatricula;
use Livewire\WithFileUploads;
use App\Models\Pago;

use Illuminate\Support\Facades\File;

class MisPagos extends Component
{
    use WithFileUploads;

    public $comprobante;

    protected $rules = [
        'comprobante' => 'required|image|max:4096'
    ];

    public function render()
    {
        $datosMatricula = ConfiguracionMatricula::all();
        return view('livewire.matriculados.mis-pagos', compact('datosMatricula'));
    }

    public function PagoTransferencia()
    {
        
        $this->validate();

        if ($this->comprobante) {
            $rutaImagen = time() . '.' . $this->comprobante->getClientOriginalExtension();
        
            $this->comprobante->storeAs($rutaImagen);
        
            // Eliminar el archivo temporal
            if (File::exists($this->comprobante->getRealPath())) {
                File::delete($this->comprobante->getRealPath());
            }
        }       

        $datos = ConfiguracionMatricula::first();

        $pago = new Pago();
        $pago->user_id = auth()->user()->id;
        $pago->precio = $datos->precio_matricula;
        $pago->fecha_de_pago = $datos->fecha_vencimiento;
        $pago->estado = 'pendiente';
        $pago->visto = false;
        $pago->tipo_de_pago = 'digital';
        $pago->descripcion = 'Cuota de matrícula mensual';
        if (isset($rutaImagen)) {
            $pago->comprobante_path = $rutaImagen;
        }

        $pago->save();
        
        return redirect()->route('dashboard');
    }
}
