<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = ['location', 'codigo31662'];

    public function areas()
    {
        return $this->hasMany(Area::class);
    }
}
