<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatosDePago extends Model
{
    use HasFactory;

    protected $table = 'datos_de_pagos';

    protected $fillable = [
        'matricula',
        'matricula_anterior', 
        'multa',
        'multa_por_suspension',
        'habilitaciones',
        'ioma',
        'supervisiones',
        'cursos',
        'carpeta_especialidad',
        'escuelas',
        'pago_cuentas', 
        'otros_pagos',
        'importe_total',
        'pago_enviado',
        'estado',
        'motivos',
        'visto',
        'image_path'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function matriculado() {
        return $this->belongsTo(Matriculado::class);
    }

    // Relación con el modelo Image
    public function images()
    {
        return $this->hasMany(Image::class, 'pago_id');
    }

    // Verificamos todos los nuevos regisrtos que hay con el estado en_proceso y asi mostrar la notificación en el menu admin
    public static function getCountEnProceso()
    {
        return self::where('estado', 'en_proceso')->count();
    }
}
