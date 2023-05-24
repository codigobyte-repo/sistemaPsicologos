<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matriculado extends Model
{
    use HasFactory;

    /* genero */
    const MASCULINO = 1;
    const FEMENINO = 2;

    /* estado_observacion */
    const RECEPCIONADO = 1;
    const OTRO = 2;

    /* tipo_documento */
    const DNI = 1;
    const LE = 2;
    const LC = 3;

    /* categoria */
    const A = 1;
    const B = 2;
    const C = 3;

}
