<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matriculado extends Model
{
    use HasFactory;

    /* genero */
    const GENERO_MASCULINO = 1;
    const GENERO_FEMENINO = 2;

    /* estado_observacion */
    const RECEPCIONADO = 1;
    const OTRO = 2;

    /* tipo_documento */
    const DNI = 1;
    const LE = 2;
    const LC = 3;
    const CI = 4;

    /* categoria */
    const A = 1;
    const B = 2;
    const C = 3;

    protected $fillable = [
        'fecha_matriculacion',
        'matricula',
        'distrito_matriculas_id',
        'distrito_revistas_id',
        'genero',
        'fecha_nacimiento',
        'estado_observacion',
        'situacion_revistas_id',
        'situacion_revista_motivos_id',
        'situacion_de_revista_fecha',
        'nationalities_id',
        'tipo_documento',
        'documento_nro',
        'cuit',
        'domicilio_particular',
        'domicilio_particular_codigo_postal',
        'domicilio_particular_localidad',
        'domicilio_particular_municipio',
        'domicilio_particular_telefonos',
        'domicilio_particular_telefonos_alternativo',
        'domicilio_profesional_telefonos_alternativo',
        'domicilio_profesional',
        'domicilio_profesional_codigo_postal',
        'domicilio_profesional_localidad',
        'domicilio_profesional_municipio',
        'domicilio_profesional_telefonos',
        'titulo_universitarios_id',
        'universities_id',
        'fecha_expedicion_titulo',
        'fecha_ejercicio_desde',
        'fecha_terminacion_estudios',
        'actuacion_gp_cdd',
        'actuacion_gp_cs',
        'actuacion_gp_tdd',
        'actuacion_gp_tsd',
        'registrado_tomo',
        'registrado_folio',
        'categoria',
        'observaciones',
        'users_id',
    ];

    public function distritoMatricula()
    {
        return $this->belongsTo(DistritoMatricula::class, 'distrito_matriculas_id');
    }

    public function distritoRevista()
    {
        return $this->belongsTo(DistritoRevista::class, 'distrito_revistas_id');
    }

    public function situacionRevista()
    {
        return $this->belongsTo(SituacionRevista::class, 'situacion_revistas_id');
    }

    public function situacionRevistaMotivo()
    {
        return $this->belongsTo(SituacionRevistaMotivo::class, 'situacion_revista_motivos_id');
    }

    public function nationality()
    {
        return $this->belongsTo(Nationality::class, 'nationalities_id');
    }

    public function tituloUniversitario()
    {
        return $this->belongsTo(TituloUniversitario::class, 'titulo_universitarios_id');
    }

    public function university()
    {
        return $this->belongsTo(University::class, 'universities_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

}
