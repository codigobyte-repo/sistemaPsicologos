<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'precio', 'fecha_de_pago', 'estado', 'comprobante_path', 'motivos', 'visto', 'tipo_de_pago', 'descripcion'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
