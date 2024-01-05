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
        'image_path',
        'otros_pagos_matricula',
        'meses',
        'otros_pagos_descripcion'
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

    // Verificamos todos los nuevos registros que hay con el estado en_proceso y asi mostrar la notificación en el menu admin
    public static function getCountEnProceso()
    {
        return self::where('estado', 'en_proceso')->count();
    }

    /* Obtenemos los totales de cada estado. En estos métodos, utilizamos sum() para calcular los totales de importe_total para cada estado específico. 
    El método getBalancePorEstado() devuelve un arreglo que contiene los totales para cada estado.*/
    public static function getTotalPorEstado($estado)
    {
        return self::where('estado', $estado)->sum('importe_total');
    }

    public static function getBalancePorEstado()
    {
        return [
            'en_proceso' => self::getTotalPorEstado('en_proceso'),
            'rechazado' => self::getTotalPorEstado('rechazado'),
            'aprobado' => self::getTotalPorEstado('aprobado'),
        ];
    }

    // Función para contar registros por estado
    public static function contarRegistrosPorEstado($estado)
    {
        return self::where('estado', $estado)->count();
    }
}
