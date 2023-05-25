<?php

namespace Database\Seeders;

use App\Models\DistritoMatricula;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DistritoMatriculasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $distritos = [
            '1',
            '2',
            '3',
            '4',
            '5',
            '6',
            '7',
            '8',
            '9',
            '10',
            '11',
            '12',
            '13'
        ];

        foreach ($distritos as $distrito) {
            DistritoMatricula::create([
                'codigo' => $distrito
            ]);
        }
    }
}
