<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;

    protected $fillable = [
        'pago_id',
        'user_id',
        'dato_id',
        'numero_factura',
        'fecha_emision',
    ];

    public function pago()
    {
        return $this->belongsTo(Pago::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function dato()
    {
        return $this->belongsTo(Dato::class);
    }
}
