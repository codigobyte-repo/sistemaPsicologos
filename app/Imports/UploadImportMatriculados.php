<?php

namespace App\Imports;

use App\Models\DistritoMatricula;
use App\Models\User;
use App\Models\TituloUniversitario;
use App\Models\Nationality;
use App\Models\DistritoRevista;
use App\Models\University;
use App\Models\Matriculado;
use App\Models\SituacionRevista;
use App\Models\SituacionRevistaMotivo;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
/* use Maatwebsite\Excel\Concerns\WithStartRow; */
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Carbon\Carbon;

class UploadImportMatriculados implements ToModel, WithHeadingRow, WithBatchInserts, WithChunkReading
{
    
    private $distritoMatriculas;
    private $distritoRevistas;
    private $nationality;
    private $situacionRevista;
    private $situacionRevistaMotivos;
    private $tituloUniversitario;
    private $universidad;
    private $usuarioApellido;

    public function __construct()
    {
        $this->distritoMatriculas = DistritoMatricula::pluck('id', 'codigo');
        $this->distritoRevistas = DistritoRevista::pluck('id', 'codigo');
        $this->nationality = Nationality::pluck('id', 'nombre_excel');
        $this->situacionRevista = SituacionRevista::pluck('id', 'nombre');
        $this->situacionRevistaMotivos = SituacionRevistaMotivo::pluck('id', 'nombre');
        $this->tituloUniversitario = TituloUniversitario::pluck('id', 'nombre');
        $this->universidad = University::pluck('id', 'nombre');
        $this->usuarioApellido = User::pluck('id', 'lastname');
    }

    public function transformDate($value, $format = 'd-m-Y')
    {
        try {
            $dateObject = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value);
            $timestamp = date_timestamp_get($dateObject);
            return $timestamp !== 0 ? \Carbon\Carbon::instance($dateObject) : null;
        } catch (\ErrorException $e) {
            return \Carbon\Carbon::createFromFormat($format, $value);
        }        
    }

    public function model(array $row)
    {
        
        set_time_limit(300); // Aumenta el límite a 300 segundos

        $user = new User();
        $user->name = $row['nombres'];
        $user->lastname = $row['apellido'];
        $user->matricula = $row['matricula'];
        $user->email = $row['email'];
        $user->password = Hash::make('password');
        $user->save();

        $matriculado = new Matriculado();

        $matriculado->fecha_matriculacion = $this->transformDate($row['fecha_matriculacion']);
        $matriculado->matricula = $row['matricula'];
        $matriculado->distrito_matriculas_id = $this->distritoMatriculas[$row['distrito_matriculacion']];
        $matriculado->distrito_revistas_id = $this->distritoRevistas[$row['distrito_revista']];
        
        /* Genero */
        $generos = [
            1 => 'M',
            2 => 'F',
        ];
        $matriculado->genero = array_search($row['sexo'], $generos);
        /* Genero */
        
        $matriculado->fecha_nacimiento = $this->transformDate($row['fecha_nacimiento']);
        
        /* Observación */
        $observacion = [
            'RECEPCIONADO' => Matriculado::RECEPCIONADO,
            'OTRO' => Matriculado::OTRO,
        ];
        
        $valorObservacion = $row['observacion'];
        
        if (empty($valorObservacion)) {
            $matriculado->estado_observacion = null;
        } else {
            $matriculado->estado_observacion = $observacion[$valorObservacion] ?? null;
        }
        /* Observación */

        $matriculado->situacion_revistas_id = $this->situacionRevista[$row['situacion_de_revista']];
        $matriculado->situacion_revista_motivos_id = $this->situacionRevistaMotivos[$row['situacion_revista_motivo']];
        $matriculado->situacion_de_revista_fecha = $this->transformDate($row['situacion_de_revista_fecha']);

        $matriculado->nationalities_id = $this->nationality[$row['nacionalidad']];

        /* Tipo documento */
        $tipoDocumento = [
            Matriculado::DNI => 'DNI',
            Matriculado::LE => 'LE',
            Matriculado::LC => 'LC',
            Matriculado::CI => 'CI'
        ];
        
        $valorTipoDocumento = $row['documento_tipo'];
        
        if (empty($valorTipoDocumento)) {
            $matriculado->tipo_documento = null;
        } else {
            $tipoDocumentoAsignado = array_search($valorTipoDocumento, $tipoDocumento, true);
            $matriculado->tipo_documento = $tipoDocumentoAsignado !== false ? $tipoDocumentoAsignado : null;
        }
        /* Tipo documento */

        $matriculado->documento_nro = $row['documento_nro'];
        $matriculado->cuit = $row['cuit'];
        $matriculado->domicilio_particular = $row['dom_particular'];
        $matriculado->domicilio_particular_codigo_postal = $row['dom_particular_codigo_postal'];
        $matriculado->domicilio_particular_localidad = $row['dom_particular_localidad'];
        $matriculado->domicilio_particular_municipio = $row['dom_particular_municipio'];
        $matriculado->domicilio_particular_telefonos = $row['dom_particular_telefonos'];
        $matriculado->domicilio_profesional = $row['dom_profesional'];
        $matriculado->domicilio_profesional_codigo_postal = $row['dom_profesional_codigo_postal'];
        $matriculado->domicilio_profesional_localidad = $row['dom_profesional_localidad'];
        $matriculado->domicilio_profesional_municipio = $row['dom_profesional_municipio'];
        $matriculado->domicilio_profesional_telefonos = $row['dom_profesional_telefonos'];
        $matriculado->titulo_universitarios_id = $this->tituloUniversitario[$row['titulo_universitario']];
        $matriculado->universities_id = $this->universidad[$row['universidad']];
        $matriculado->fecha_expedicion_titulo = $this->transformDate($row['fecha_expedicion_titulo']);
        $matriculado->fecha_ejercicio_desde = $this->transformDate($row['fecha_ejercicio_desde']);
        $matriculado->fecha_terminacion_estudios = $this->transformDate($row['fecha_terminacion_estudios']);
        $matriculado->actuacion_gp_cdd = $row['actuacion_gp_cdd'];
        $matriculado->actuacion_gp_cs = $row['actuacion_gp_cs'];
        $matriculado->actuacion_gp_tdd = $row['actuacion_gp_tdd'];
        $matriculado->actuacion_gp_tsd = $row['actuacion_gp_tsd'];
        $matriculado->registrado_tomo = $row['registrado_tomo'];
        $matriculado->registrado_folio = $row['registrado_folio'];

        /* Categoria */
        $category = [
            Matriculado::A => 'A',
            Matriculado::B => 'B',
            Matriculado::C => 'C',
        ];
        $valorCategory = $row['categoria'];

        if (empty($valorCategory)) {
            $matriculado->categoria = null;
        } else {
            $categoriaAsignada = array_search($valorCategory, $category, true);
            $matriculado->categoria = $categoriaAsignada !== false ? $categoriaAsignada : null;
        }
        /* Categoria */

        $matriculado->observaciones = $row['observaciones'];
        $matriculado->user_id = $user->id;
        $matriculado->save();

    }

    public function batchSize(): int
    {
        return 6000;
    }

    public function chunkSize(): int
    {
        return 6000;
    }
}
