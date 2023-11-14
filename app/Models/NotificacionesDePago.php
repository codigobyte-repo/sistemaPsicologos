<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotificacionesDePago extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'tipo_notificacion', 'fecha_notificacion', 'visto'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
