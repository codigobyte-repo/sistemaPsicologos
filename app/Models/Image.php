<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['path', 'pago_id'];

    // Relación con el modelo DatosDePago
    public function datosDePago()
    {
        return $this->belongsTo(DatosDePago::class, 'pago_id');
    }
}
