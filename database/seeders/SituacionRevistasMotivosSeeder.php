<?php

namespace Database\Seeders;

use App\Models\SituacionRevistaMotivo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SituacionRevistasMotivosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $situaciones = [
            'RECEPCION DE TRASLADO',
            'REINCORPORACION',
            'JUBILACION',
            'ARTICULO 56 I E',
            'FALTA DE PAGO',
            'RADICA FUERA DE LA PROVINCIA',
            'NO EJERCE EN LA PROVINCIA DE BS AS',
            'FALLECIMIENTO',
            'RAZONES DE SALUD',
            'MATRICULACION INICIAL'

        ];

        foreach ($situaciones as $situacion) {
            
            SituacionRevistaMotivo::create([
                'nombre' => $situacion
            ]);

        }
    }
}
