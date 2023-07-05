<?php

namespace Database\Seeders;

use App\Models\Dato;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Dato::create([
            'razon_social' => 'Colegio de Psicologos de la Provincia de Buenos Aires. Distrito XIII',
            'domicilio_comercial' => 'Alsina 1778, Lomas de Zamora, 1832, Argentina',
            'cuit' => '30-63218974-1',
            'condicion_frente_al_iva' => 'Responsable Inscripto',
            'punto_venta' => '0013',
            'ingresos_brutos' => '30632189741',
            'fecha_inicio_actividades' => '1950-01-01',
            'condicion_venta' => 'Contado',
            'codigo' => '0001',
        ]);
    }
}
