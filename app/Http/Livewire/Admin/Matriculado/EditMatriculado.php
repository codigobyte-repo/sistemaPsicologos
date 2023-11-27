<?php

namespace App\Http\Livewire\Admin\Matriculado;

use App\Models\Area;
use App\Models\DistritoMatricula;
use App\Models\DistritoRevista;
use App\Models\Location;
use App\Models\Matriculado;
use App\Models\Nationality;
use App\Models\SituacionRevista;
use App\Models\SituacionRevistaMotivo;
use App\Models\User;
use Livewire\Component;

class EditMatriculado extends Component
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

    public $nacionalidades;
    public $datos_usuario;
    public $distrito_matriculas;
    public $distrito_revistas;
    public $situacion_revistas;
    public $situacion_revistas_motivos;
    public $situacion_revistas_fechas;

    public function mount(Matriculado $matriculado)
    {
        $this->matriculado = $matriculado;

        $this->datos_usuario = User::where('matricula', $matriculado->matricula)->first();
        $this->matricula = $matriculado->matricula;
        $this->fecha_matriculacion = $matriculado->fecha_matriculacion;
        
        $this->distrito_matriculas = DistritoMatricula::all();
        $this->distrito_matriculas_id = $matriculado->distrito_matriculas_id;

        $this->distrito_revistas = DistritoRevista::all();
        $this->distrito_revistas_id = $matriculado->distrito_revistas_id;

        $this->estado_observacion = $matriculado->estado_observacion;

        $this->situacion_revistas = SituacionRevista::all();
        $this->situacion_revistas_id = $matriculado->situacion_revistas_id;

        $this->situacion_revistas_motivos = SituacionRevistaMotivo::all();
        $this->situacion_revista_motivos_id = $matriculado->situacion_revista_motivos_id;
        
        $this->situacion_de_revista_fecha = $matriculado->situacion_de_revista_fecha;

        $this->genero = $matriculado->genero;
        $this->fecha_nacimiento = $matriculado->fecha_nacimiento;
        
        $this->nacionalidades = Nationality::all();
        $this->nationalities_id = $matriculado->nationalities_id;

        $this->tipo_documento = $matriculado->tipo_documento;
        $this->documento_nro = $matriculado->documento_nro;
        $this->cuit = $matriculado->cuit;


        $this->domicilio_particular_telefonos = $matriculado->domicilio_particular_telefonos;        
        $this->domicilio_particular_telefonos_alternativo = $matriculado->domicilio_particular_telefonos_alternativo;
        $this->domicilio_profesional_telefonos_alternativo = $matriculado->domicilio_profesional_telefonos_alternativo;
        
        $this->domicilio_profesional = $matriculado->domicilio_profesional;
        $this->domicilio_profesional_telefonos = $matriculado->domicilio_profesional_telefonos;
        
        $this->titulo_universitarios_id = $matriculado->titulo_universitarios_id;
        $this->universities_id = $matriculado->universities_id;
        $this->fecha_expedicion_titulo = $matriculado->fecha_expedicion_titulo;
        $this->fecha_ejercicio_desde = $matriculado->fecha_ejercicio_desde;
        $this->fecha_terminacion_estudios = $matriculado->fecha_terminacion_estudios;
        $this->actuacion_gp_cdd = $matriculado->actuacion_gp_cdd;
        $this->actuacion_gp_cs = $matriculado->actuacion_gp_cs;
        $this->actuacion_gp_tdd = $matriculado->actuacion_gp_tdd;
        $this->actuacion_gp_tsd = $matriculado->actuacion_gp_tsd;
        $this->registrado_tomo = $matriculado->registrado_tomo;
        $this->registrado_folio = $matriculado->registrado_folio;
        $this->categoria = $matriculado->categoria;
        $this->observaciones = $matriculado->observaciones;
        $this->users_id = $matriculado->users_id;

        /* DOMICILIO PARTICULAR */

        $this->domicilio_particular = $matriculado->domicilio_particular;
        $this->domicilio_particular_localidad = $matriculado->domicilio_particular_localidad;

        $locationParticular = Location::with('areas')->where('location', $matriculado->domicilio_particular_localidad)->first();
        $this->municipios = $locationParticular ? $locationParticular->areas->toArray() : [];

        $this->domicilio_particular_municipio = $matriculado->domicilio_particular_municipio;
        $this->domicilio_particular_codigo_postal = $matriculado->domicilio_particular_codigo_postal;

        /* DOMICILIO PARTICULAR */


        /* DOMICILIO PROFESIONAL */
        $this->domicilio_profesional_localidad = $matriculado->domicilio_profesional_localidad;
        $locationProfesional = Location::with('areas')->where('location', $matriculado->domicilio_profesional_localidad)->first();
        $this->municipiosProfesional = $locationProfesional ? $locationProfesional->areas->toArray() : [];

        $this->domicilio_profesional_municipio = $matriculado->domicilio_profesional_municipio;
        $this->domicilio_profesional_codigo_postal = $matriculado->domicilio_profesional_codigo_postal;
        /* DOMICILIO PROFESIONAL */

    }

    public function updatedDomicilioParticularLocalidad($localidad)
    {
        $location = Location::with('areas')->where('location', $localidad)->first();

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
        $location = Location::with('areas')->where('location', $localidad)->first();

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
        return view('livewire.admin.matriculado.edit-matriculado');
    }

    public function save()
    {
        $validatedData = $this->validate([
            'fecha_matriculacion' => 'required',
            'matricula' => 'required|unique:matriculados,matricula,' . $this->matriculado->id,
            'distrito_matriculas_id' => 'required',
            'distrito_revistas_id' => 'required',
            'genero' => 'required',
            'fecha_nacimiento' => 'required',
            'estado_observacion' => 'required',
            'situacion_revistas_id' => 'required',
            'situacion_revista_motivos_id' => 'required',
            "situacion_de_revista_fecha" => 'required',
            'nationalities_id' => 'required',
            'tipo_documento' => 'required',
            'documento_nro' => 'required',
            "cuit" => 'required',
            'domicilio_particular' => 'nullable',
            'domicilio_particular_codigo_postal' => 'nullable',
            'domicilio_particular_localidad' => 'nullable',
            'domicilio_particular_municipio' => 'nullable',
            'domicilio_profesional' => 'nullable',
            'domicilio_profesional_localidad' => 'nullable',
            'domicilio_profesional_municipio' => 'nullable',
            'domicilio_profesional_codigo_postal' => 'nullable',
            "domicilio_particular_telefonos" => 'nullable',
            "domicilio_particular_telefonos_alternativo" => 'nullable',
            "domicilio_profesional_telefonos_alternativo" => 'nullable',
            'titulo_universitarios_id' => 'required',
            'universities_id' => 'required',
            'fecha_expedicion_titulo' => 'required',
            'fecha_ejercicio_desde' => 'required',
            "fecha_terminacion_estudios" => 'required',            
            "actuacion_gp_cdd" => 'nullable',
            "actuacion_gp_cs" => 'nullable',
            "actuacion_gp_tdd" => 'nullable',
            "actuacion_gp_tsd" => 'nullable',
            'registrado_tomo' => 'required',
            'registrado_folio' => 'required',
            'categoria' => 'required',
            "observaciones" => 'nullable',
        ]);

        Matriculado::where('id', $this->matriculado->id)->update($validatedData);

        return redirect()->route('admin.matriculados')->with('message', 'Los datos del usuario se actualizaron correctamente.');
    }
}
