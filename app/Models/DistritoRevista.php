<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DistritoRevista extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'codigo'];

    public function matriculados()
    {
        return $this->hasMany(Matriculado::class, 'nationalities_id');
    }
}