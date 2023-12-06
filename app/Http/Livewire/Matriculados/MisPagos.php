<?php

namespace App\Http\Livewire\Matriculados;

use Livewire\Component;
use App\Models\DatosDePago;
use App\Models\Image;
use App\Models\Matriculado;
use App\Models\NotificacionesDePago;
use App\Models\precio_servicio;
use App\Models\RemoveImages;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class MisPagos extends Component
{
    public $image_path;

    public $matriculado, $matriculadoCategoria;

    public $importeSupervisiones;

    public $userId, $precioServicios;

    public $matriculaA,
    $matriculaB,
    $matriculaC,
    $matriculaFid,
    $multa,
    $habilitaciones,
    $supervisiones_menos_5_anos,
    $supervisiones_mas_5_anos,
    $supervisiones_forenses,
    $resultadoMatriculaA,
    $resultadoMatriculaB,
    $resultadoMatriculaC;

    //Funcionalidad
    public $isCheckedMatricula = false;
    public $inputMatriculaAnterior;
    public $isCheckedMulta = false;
    public $inputMultaPorSuspension;
    public $isCheckedHabilitaciones = false;
    public $inputHabilitaciones;
    public $inputIoma;
    public $isCheckedSupervisiones = false;
    public $inputSupervisiones;
    public $inputCursos;
    public $inputCarpetaEspecialidad;
    public $inputEscuelas;
    public $inputPagoACuentas;
    public $inputOtrosPagos;

    public $pagoEnviado = 0.0;
    public $importeTotal = 0.0;
    public $saldoFavor = 0.0;
    public $saldoNegativo = 0.0;
    public $saldoMayor = '';


    public function mount()
    {
        $this->image_path = Session::get('image_path');

        $this->userId = auth()->user()->id;

        //traemos el valor de los servicios
        $this->precioServicios = precio_servicio::first();

        //cargamos cada valor de la tabla de los servicios para mostrar en la vista
        $this->matriculaA = $this->precioServicios->matricula_actual_categoria_a;
        $this->matriculaB = $this->precioServicios->matricula_actual_categoria_b;
        $this->matriculaC = $this->precioServicios->matricula_actual_categoria_c;
        $this->matriculaFid = $this->precioServicios->matricula_actual_fid;
        $this->multa = $this->precioServicios->multa;
        $this->habilitaciones = $this->precioServicios->habilitaciones;
        $this->supervisiones_menos_5_anos = $this->precioServicios->supervisiones_menos_5_anos;
        $this->supervisiones_mas_5_anos = $this->precioServicios->supervisiones_mas_5_anos;
        $this->supervisiones_forenses = $this->precioServicios->supervisiones_forenses;

        $this->resultadoMatriculaA = number_format($this->matriculaA + $this->matriculaFid, 0, ',', '.');
        $this->resultadoMatriculaB = number_format($this->matriculaB + $this->matriculaFid, 0, ',', '.');
        $this->resultadoMatriculaC = number_format($this->matriculaC + $this->matriculaFid, 0, ',', '.');
    }

    /*Función: si pagoEnviado es mayor que imporTotal significa que tengo saldo a favor. Si no es mayor y es igual está bien, no se debe hacer nada. 
    Si es menor, puede ser menor hasta 50 pesos menos de 50 debe mostrar un mensaje que no puede ser menor entre 0 y 50 debe mostrar que saldo es. */
    public function updatedPagoEnviado()
    {
        $importeTotal = floatval(str_replace(',', '.', $this->importeTotal));
        $pagoEnviado = floatval(str_replace(',', '.', $this->pagoEnviado));

        if ($pagoEnviado > $importeTotal) {
            $this->saldoFavor = $pagoEnviado - $importeTotal;
            $this->saldoNegativo = 0.0;
            $this->saldoMayor = '';
        } elseif ($pagoEnviado < $importeTotal && ($importeTotal - $pagoEnviado) <= 50) {
            $this->saldoNegativo = $importeTotal - $pagoEnviado;
            $this->saldoFavor = 0.0;
            $this->saldoMayor = '';
        } elseif (($importeTotal - $pagoEnviado) > 50) {
            $this->saldoMayor = "No puede deber un importe mayor a $50.-";
            $this->saldoFavor = 0.0;
            $this->saldoNegativo = 0.0;
        } else {
            $this->saldoFavor = 0.0;
            $this->saldoNegativo = 0.0;
            $this->saldoMayor = '';
        }
    }

    public function render()
    {
        $this->cargarDatosMatriculado();
        $this->verificarFechaMatriculacion();
        return view('livewire.matriculados.mis-pagos');
    }

    public function cargarDatosMatriculado()
    {
        $this->matriculado = Matriculado::where('user_id', $this->userId)->first();
        $this->matriculadoCategoria = $this->matriculado->categoria;
    }

    public function verificarFechaMatriculacion()
    {
        if ($this->matriculado) {
            $fechaMatriculacion = Carbon::parse($this->matriculado->fecha_matriculacion);
            $fechaActual = Carbon::now();
            $diferencia = $fechaMatriculacion->diffInYears($fechaActual);
            //mostramos en la vista los precios de menos de 5 años y mas de 5 años
            if ($diferencia < 5) {
                $this->importeSupervisiones = $this->supervisiones_menos_5_anos;
            } else {
                $this->importeSupervisiones = $this->supervisiones_mas_5_anos;
            }
        }
    }

    public function updatedInputHabilitaciones(){
        if($this->inputHabilitaciones != null){
            $this->isCheckedHabilitaciones = false;
        }
    }

    /* FUNCIONES QUE CALCULAN EL IMPORTE TOTAL */

    // Método para calcular el importe total
    public function calcularTotal()
    {
        $this->importeTotal = 0;
        
        $campos = [
            'inputMatriculaAnterior',
            'inputMultaPorSuspension',
            'inputHabilitaciones',
            'inputIoma',
            'inputSupervisiones',
            'inputCursos',
            'inputCarpetaEspecialidad',
            'inputEscuelas',
            'inputPagoACuentas',
            'inputOtrosPagos',
        ];

        foreach ($campos as $campo) {
            if (!empty($this->$campo) && is_numeric($this->$campo)) {
                $this->importeTotal += (int)$this->$campo;
            }
        }

        /* Los checks se suman desde aquí */
        
        if ($this->isCheckedMatricula) {
            if($this->matriculadoCategoria == 1){
                $this->importeTotal += $this->matriculaA + $this->matriculaFid;
            }elseif($this->matriculadoCategoria == 2){
                $this->importeTotal += $this->matriculaB + $this->matriculaFid;
            }else{
                $this->importeTotal += $this->matriculaC + $this->matriculaFid;
            }
        }

        if ($this->isCheckedMulta) {
            $this->importeTotal += $this->multa;
        }

        if($this->isCheckedHabilitaciones){
            $this->importeTotal +=  $this->habilitaciones;
        }

        if($this->isCheckedSupervisiones){
            $this->importeTotal += $this->importeSupervisiones + $this->supervisiones_forenses;
        }
    }

    // Se ejecuta cada vez que hay cambios en un campo
    public function updated($campo)
    {
        if (in_array($campo, [
            'isCheckedMatricula',
            'inputMatriculaAnterior',
            'isCheckedMulta',
            'inputMultaPorSuspension',
            'isCheckedHabilitaciones',
            'inputHabilitaciones',
            'inputIoma',
            'isCheckedSupervisiones',
            'inputSupervisiones',
            'inputCursos',
            'inputCarpetaEspecialidad',
            'inputEscuelas',
            'inputPagoACuentas',
            'inputOtrosPagos',
            'importeTotal'
        ])) {
            $this->calcularTotal();
        }
    }


    /* FIN FUNCIONES QUE CALCULAN EL IMPORTE TOTAL */

    protected $rules = [
        'inputMatriculaAnterior' => 'nullable|numeric',
        'inputMultaPorSuspension' => 'nullable|numeric|required_if:isCheckedMulta,1',
        'inputIoma' => 'nullable|numeric',
        'inputCursos' => 'nullable|numeric',
        'inputCarpetaEspecialidad' => 'nullable|numeric',
        'inputEscuelas' => 'nullable|numeric',
        'inputPagoACuentas' => 'nullable|numeric',
        'inputOtrosPagos' => 'nullable|numeric',
        'importeTotal' => 'nullable|numeric',
        'pagoEnviado' => 'nullable|numeric',
    ];

    public function datosDePagos()
    {
        $this->validate();
        
        $matriculado = Matriculado::where('user_id', auth()->user()->id)->first();

        $pago = new DatosDePago();

        if($this->isCheckedMatricula){    
            $this->verCategoria($pago);
        }

        $pago->matricula_anterior = $this->inputMatriculaAnterior;

        if($this->isCheckedMulta){
            $pago->multa = $this->multa;
        }

        $pago->multa_por_suspension = $this->inputMultaPorSuspension;

        if($this->isCheckedHabilitaciones){
            $pago->habilitaciones = $this->habilitaciones;
        }elseif($this->inputHabilitaciones){
            $pago->habilitaciones = $this->inputHabilitaciones;
        }

        $pago->ioma = $this->inputIoma;
        
        if($this->isCheckedSupervisiones){
            $pago->supervisiones = $this->importeSupervisiones + $this->supervisiones_forenses;
        }elseif($this->inputSupervisiones){
            $pago->supervisiones = $this->inputSupervisiones;
        }

        $pago->cursos = $this->inputCursos;
        $pago->carpeta_especialidad = $this->inputCarpetaEspecialidad;
        $pago->escuelas = $this->inputEscuelas;
        $pago->pago_cuentas = $this->inputPagoACuentas;
        $pago->otros_pagos = $this->inputOtrosPagos;
        $pago->importe_total = $this->importeTotal;
        $pago->pago_enviado = $this->pagoEnviado;
        $pago->saldo_a_favor = $this->saldoFavor;
        $pago->saldo_negativo = $this->saldoNegativo;
        $pago->image_path = $this->image_path;

        $pago->user_id = auth()->user()->id;
        $pago->matriculado_id = $matriculado->id;

        $pago->save();
            
        Image::create([
            'path' => $this->image_path,
            'pago_id' => $pago->id, 
        ]);

        // Este paso lo hacemos para asociar la imagen DO SPACES, y luego no eliminarla en la limpieza.
        $imagen = RemoveImages::where('ruta', $this->image_path)->first();
        $imagen->estado = 'asociada';
        $imagen->save();

        return redirect()->route('dashboard')->with('message', '¡Operación realizada con éxito!');

    }

    public function verCategoria($pago)
    {
        if($this->matriculadoCategoria == 1){
            $pago->matricula = $this->matriculaA + $this->matriculaFid;
        }elseif($this->matriculadoCategoria == 2){
            $pago->matricula = $this->matriculaB + $this->matriculaFid;
        }else{
            $pago->matricula = $this->matriculaC + $this->matriculaFid;
        }
    }
}
