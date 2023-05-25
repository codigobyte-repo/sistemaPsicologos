<?php

namespace Database\Seeders;

use App\Models\SituacionRevista;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SituacionRevistasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $situaciones = [
            'VIGENTE',
            'CANCELADA',
            'SUSPENDIDA'
        ];

        foreach ($situaciones as $situacion) {
            
            SituacionRevista::create([
                'nombre' => $situacion
            ]);

        }
    }
}
