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
            'MATRICULACION INICIAL',
            'REINCORPORACION',
            'RECEPCION DE TRASLADO',
            'JUBILACION',
            'ARTICULO 56 I E',
            'FALTA DE PAGO',
            'RADICA FUERA DE LA PROVINCIA',
            'RADICA FUERA DEL PAIS',
            'NO EJERCE EN LA PROVINCIA DE BS AS',
            'FALLECIMIENTO',
            'RAZONES DE SALUD',
            'CESE DE EJERCICIO PROFESIONAL',
            'INHABILITACION POR TRIBUNAL DE DISCIPLINA',
            'DECISION TRIBUNAL DISCIPLINA'
        ];

        foreach ($situaciones as $situacion) {
            
            SituacionRevistaMotivo::create([
                'nombre' => $situacion
            ]);

        }
    }
}
