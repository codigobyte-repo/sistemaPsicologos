<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateMatriculadoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'fecha_matriculacion' => 'required|date',
            'matricula' => 'required',
            'distrito_matriculas_id' => 'required',
            'distrito_revistas_id' => 'required',
            'genero' => 'required',
            'fecha_nacimiento' => 'required|date',
            'estado_observacion' => 'required',
            'situacion_revistas_id' => 'required',
            'situacion_revista_motivos_id' => 'required',
            'situacion_de_revista_fecha' => 'required|date',
            'nationalities_id' => 'required',
            'tipo_documento' => 'required',
            'documento_nro' => 'required',
            'cuit' => 'required|numeric',
            'domicilio_particular' => 'required',
            'domicilio_particular_codigo_postal' => 'required',
            'domicilio_particular_localidad' => 'required',
            'domicilio_particular_municipio' => 'required',
            'domicilio_particular_telefonos' => 'required',
            'domicilio_particular_telefonos_alternativo' => 'required',
            'domicilio_profesional_telefonos_alternativo' => 'required',
            'domicilio_profesional' => 'required',
            'domicilio_profesional_codigo_postal' => 'required',
            'domicilio_profesional_localidad' => 'required',
            'domicilio_profesional_municipio' => 'required',
            'domicilio_profesional_telefonos' => 'required',
            'titulo_universitarios_id' => 'required',
            'universities_id' => 'required',
            'fecha_expedicion_titulo' => 'required|date',
            'fecha_ejercicio_desde' => 'required|date',
            'fecha_terminacion_estudios' => 'required|date',
            'actuacion_gp_cdd' => 'required',
            'actuacion_gp_cs' => 'required',
            'actuacion_gp_tdd' => 'required',
            'actuacion_gp_tsd' => 'required',
            'registrado_tomo' => 'required',
            'registrado_folio' => 'required',
            'categoria' => 'required',
            'observaciones' => 'required',
            'users_id' => 'required',
        ];
    }
}
