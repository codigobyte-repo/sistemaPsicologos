<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ConfiguracionMatriculasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('configuracion_matriculas')->insert([
            'precio_matricula' => 2999,
            'fecha_vencimiento' => Carbon::now()->addMonths(1)->startOfMonth(),
            'fecha_segundo_vencimiento' => Carbon::now()->addMonths(1)->startOfMonth()->addDays(5),
            'recargo_despues_vencimiento' => 10, // Porcentaje de recargo, ajusta el valor según tus necesidades
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
