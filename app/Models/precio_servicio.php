<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class precio_servicio extends Model
{
    use HasFactory;

    protected $fillable = [
        'matricula_actual_categoria_a',
        'matricula_actual_categoria_b',
        'matricula_actual_categoria_c',
        'matricula_actual_fid',
        'multa',
        'habilitaciones',
        'supervisiones_menos_5_anos',
        'supervisiones_mas_5_anos',
        'supervisiones_forenses'
    ];
}
