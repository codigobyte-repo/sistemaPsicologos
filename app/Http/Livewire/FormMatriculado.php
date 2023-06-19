<?php

namespace App\Http\Livewire;

use App\Models\Area;
use App\Models\Location;
use App\Models\Matriculado;
use Livewire\Component;

class FormMatriculado extends Component
{
    public $matriculado;
    public $fecha_matriculacion;
    public $matricula;
    public $distrito_matriculas_id;
    public $distrito_revistas_id;
    public $genero;
    public $fecha_nacimiento;
    public $estado_observacion;
    public $situacion_revistas_id;
    public $situacion_revista_motivos_id;
    public $situacion_de_revista_fecha;
    public $nationalities_id;
    public $tipo_documento;
    public $documento_nro;
    public $cuit;
    public $domicilio_particular;
    public $domicilio_particular_telefonos;
    public $domicilio_particular_telefonos_alternativo;
    public $domicilio_profesional_telefonos_alternativo;
    public $domicilio_profesional;
    public $domicilio_profesional_telefonos;
    public $titulo_universitarios_id;
    public $universities_id;
    public $fecha_expedicion_titulo;
    public $fecha_ejercicio_desde;
    public $fecha_terminacion_estudios;
    public $actuacion_gp_cdd;
    public $actuacion_gp_cs;
    public $actuacion_gp_tdd;
    public $actuacion_gp_tsd;
    public $registrado_tomo;
    public $registrado_folio;
    public $categoria;
    public $observaciones;
    public $users_id;
    
    public $domicilio_particular_localidad;
    public $domicilio_particular_municipio;
    public $municipios = [];
    public $domicilio_particular_codigo_postal;
    
    public $domicilio_profesional_localidad;
    public $domicilio_profesional_municipio;
    public $municipiosProfesional = [];
    public $domicilio_profesional_codigo_postal;

    public $user;

    public function mount($user)
    {
        $this->user = $user;
    }

    public function updatedDomicilioParticularLocalidad($localidad)
    {
        /* $localidadId = Location::where('location', $localidad)->value('id');
        $this->municipios = Area::where('location_id', $localidadId)->get(); */
        $location = Location::where('location', $localidad)->first();

        if ($location) {
            $this->municipios = $location->areas;
        } else {
            $this->municipios = [];
        }
    }

    public function updatedDomicilioParticularMunicipio($area)
    {
        $area = Area::where('name',$area)->value('codigopostal');
        if ($area) {
            $this->domicilio_particular_codigo_postal = $area;
        }
    }

    public function updatedDomicilioProfesionalLocalidad($localidad)
    {
        $location = Location::where('location', $localidad)->first();

        if ($location) {
            $this->municipiosProfesional = $location->areas;
        } else {
            $this->municipiosProfesional = [];
        }
    }

    public function updatedDomicilioProfesionalMunicipio($area)
    {
        $area = Area::where('name',$area)->value('codigopostal');
        if ($area) {
            $this->domicilio_profesional_codigo_postal = $area;
        }
    }

    public function render()
    {
        return view('livewire.form-matriculado');
    }

    public function save()
    {
        $this->validate([
            'fecha_matriculacion' => 'required',
            'distrito_matriculas_id' => 'required',
            'distrito_revistas_id' => 'required',
            'genero' => 'required',
            'fecha_nacimiento' => 'required',
            'estado_observacion' => 'required',
            'situacion_revistas_id' => 'required',
            'situacion_revista_motivos_id' => 'required',
            'nationalities_id' => 'required',
            'tipo_documento' => 'required',
            'documento_nro' => 'required',
            'domicilio_particular' => 'required',
            'domicilio_particular_codigo_postal' => 'required',
            'domicilio_particular_localidad' => 'required',
            'domicilio_particular_municipio' => 'required',
            'titulo_universitarios_id' => 'required',
            'universities_id' => 'required',
            'fecha_expedicion_titulo' => 'required',
            'fecha_ejercicio_desde' => 'required',
            'registrado_tomo' => 'required',
            'registrado_folio' => 'required',
            'categoria' => 'required'
        ]);

        Matriculado::create([
            'fecha_matriculacion' => $this->fecha_matriculacion,
            'distrito_matriculas_id' => $this->distrito_matriculas_id,
            'distrito_revistas_id' => $this->distrito_revistas_id,
            'genero' => $this->genero,
            'fecha_nacimiento' => $this->fecha_nacimiento,
            'estado_observacion' => $this->estado_observacion,
            'situacion_revistas_id' => $this->situacion_revistas_id,
            'situacion_revista_motivos_id' => $this->situacion_revista_motivos_id,
            'situacion_de_revista_fecha' => $this->situacion_de_revista_fecha,
            'nationalities_id' => $this->nationalities_id,
            'tipo_documento' => $this->tipo_documento,
            'documento_nro' => $this->documento_nro,
            'cuit' => $this->cuit,
            'domicilio_particular' => $this->domicilio_particular,
            'domicilio_particular_codigo_postal' => $this->domicilio_particular_codigo_postal,

            'domicilio_particular_localidad' => $this->domicilio_particular_localidad,
            'domicilio_particular_municipio' => $this->domicilio_particular_municipio,

            'domicilio_particular_telefonos' => $this->domicilio_particular_telefonos,
            'domicilio_particular_telefonos_alternativo' => $this->domicilio_particular_telefonos_alternativo,
            'domicilio_profesional_telefonos_alternativo' => $this->domicilio_profesional_telefonos_alternativo,
            'domicilio_profesional' => $this->domicilio_profesional,
            'domicilio_profesional_codigo_postal' => $this->domicilio_profesional_codigo_postal,

            'domicilio_profesional_localidad' => $this->domicilio_profesional_localidad,
            'domicilio_profesional_municipio' => $this->domicilio_profesional_municipio,

            'domicilio_profesional_telefonos' => $this->domicilio_profesional_telefonos,
            'titulo_universitarios_id' => $this->titulo_universitarios_id,
            'universities_id' => $this->universities_id,
            'fecha_expedicion_titulo' => $this->fecha_expedicion_titulo,
            'fecha_ejercicio_desde' => $this->fecha_ejercicio_desde,
            'fecha_terminacion_estudios' => $this->fecha_terminacion_estudios,
            'actuacion_gp_cdd' => $this->actuacion_gp_cdd,
            'actuacion_gp_cs' => $this->actuacion_gp_cs,
            'actuacion_gp_tdd' => $this->actuacion_gp_tdd,
            'actuacion_gp_tsd' => $this->actuacion_gp_tsd,
            'registrado_tomo' => $this->registrado_tomo,
            'registrado_folio' => $this->registrado_folio,
            'categoria' => $this->categoria,
            'observaciones' => $this->observaciones,
            'matricula' => $this->user->matricula,
            'users_id' => $this->user->id,
        ]);

        session()->flash('message', 'Matriculado creado satisfactoriamente.');
        return redirect()->route('admin.matriculados');
    }
}
