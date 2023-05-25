<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    protected $fillable = ['location_id', 'name', 'codigopostal'];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
