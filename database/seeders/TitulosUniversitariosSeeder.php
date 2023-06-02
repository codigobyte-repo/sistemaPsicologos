<?php

namespace Database\Seeders;

use App\Models\TituloUniversitario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TitulosUniversitariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $titulos = [
            'PSICOLOGO',
            'LICENCIADO EN PSICOLOGIA',
            'SIN REFERENCIA',
            'PSICOLOGO CLINICO',
            'PROFESORADO PSICOLOGIA'
        ];
        foreach ($titulos as $titulo) {
            TituloUniversitario::create([
                'nombre' => $titulo
            ]);
        }
    }
}
