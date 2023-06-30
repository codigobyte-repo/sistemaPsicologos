<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfiguracionMatricula extends Model
{
    use HasFactory;
    
    protected $fillable = ['precio_matricula', 'fecha_vencimiento', 'fecha_segundo_vencimiento', 'recargo_despues_vencimiento'];
}
