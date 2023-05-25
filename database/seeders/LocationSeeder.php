<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $locations = [
            [
                'location' => 'Ciudad Autónoma de Buenos Aires (CABA)', 
                'codigo31662' => 'AR-C',
            ],
            [
                'location' => 'Buenos Aires', 
                'codigo31662' => 'AR-B',
            ],
            [
                'location' => 'Catamarca', 
                'codigo31662' => 'AR-K',
            ],
            [
                'location' => 'Córdoba', 
                'codigo31662' => 'AR-X',
            ],
            [
                'location' => 'Corrientes', 
                'codigo31662' => 'AR-W',
            ],
            [
                'location' => 'Entre Ríos', 
                'codigo31662' => 'AR-E',
            ],
            [
                'location' => 'Jujuy', 
                'codigo31662' => 'AR-Y',
            ],
            [
                'location' => 'Mendoza', 
                'codigo31662' => 'AR-M',
            ],
            [
                'location' => 'La Rioja', 
                'codigo31662' => 'AR-F',
            ],
            [
                'location' => 'Salta', 
                'codigo31662' => 'AR-A',
            ],
            [
                'location' => 'San Jua', 
                'codigo31662' => 'AR-J',
            ],
            [
                'location' => 'San Luis', 
                'codigo31662' => 'AR-D',
            ],
            [
                'location' => 'Santa Fe', 
                'codigo31662' => 'AR-S',
            ],
            [
                'location' => 'Santiago del Estero', 
                'codigo31662' => 'AR-G',
            ],
            [
                'location' => 'Tucumán', 
                'codigo31662' => 'AR-T',
            ],
            [
                'location' => 'Chaco', 
                'codigo31662' => 'AR-H',
            ],
            [
                'location' => 'Chubut', 
                'codigo31662' => 'AR-U',
            ],
            [
                'location' => 'Formosa', 
                'codigo31662' => 'AR-P',
            ],
            [
                'location' => 'Misiones', 
                'codigo31662' => 'AR-N',
            ],
            [
                'location' => 'Neuquén', 
                'codigo31662' => 'AR-Q',
            ],
            [
                'location' => 'La Pampa', 
                'codigo31662' => 'AR-L',
            ],
            [
                'location' => 'Río Negro', 
                'codigo31662' => 'AR-R',
            ],
            [
                'location' => 'Santa Cruz', 
                'codigo31662' => 'AR-Z',
            ],
            [
                'location' => 'Tierra del Fuego', 
                'codigo31662' => 'AR-V',
            ]

        ];

        foreach ($locations as $location) {
            Location::factory(1)->create($location)->first();
        }
    }
}
