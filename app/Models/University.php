<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'direccion'];

    public function matriculados()
    {
        return $this->hasMany(Matriculado::class, 'nationalities_id');
    }
}
