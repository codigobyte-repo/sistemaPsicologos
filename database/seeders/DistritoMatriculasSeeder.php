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
            [ 
                'codigo' => '1',
                'nombre' => 'Distrito 1'
            ],
            [ 
                'codigo' => '2',
                'nombre' => 'Distrito 2'
            ],
            [ 
                'codigo' => '3',
                'nombre' => 'Distrito 3'
            ],
            [ 
                'codigo' => '4',
                'nombre' => 'Distrito 4'
            ],
            [ 
                'codigo' => '5',
                'nombre' => 'Distrito 5'
            ],
            [ 
                'codigo' => '6',
                'nombre' => 'Distrito 6'
            ],
            [ 
                'codigo' => '7',
                'nombre' => 'Distrito 7'
            ],
            [ 
                'codigo' => '8',
                'nombre' => 'Distrito 8'
            ],
            [ 
                'codigo' => '9',
                'nombre' => 'Distrito 9'
            ],
            [ 
                'codigo' => '10',
                'nombre' => 'Distrito 10'
            ],
            [ 
                'codigo' => '11',
                'nombre' => 'Distrito 11'
            ],
            [ 
                'codigo' => '12',
                'nombre' => 'Distrito 12'
            ],
            [ 
                'codigo' => '13',
                'nombre' => 'Distrito 13'
            ],
            [ 
                'codigo' => '14',
                'nombre' => 'Distrito 14'
            ],
            [ 
                'codigo' => '15',
                'nombre' => 'Distrito 15'
            ],
        ];

        foreach ($distritos as $distrito) {
            DistritoMatricula::create($distrito);
        }
    }
}
