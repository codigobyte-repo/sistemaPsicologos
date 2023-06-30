<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        /* Roles y permisos */
        $this->call(RolSeeder::class);
        
        $this->call(UsersTableSeeder::class);
        $this->call(LocationSeeder::class);
        $this->call(UniversitySeeder::class);
        $this->call(DistritoRevistaSeeder::class);
        $this->call(NationalitiesSeeder::class);
        $this->call(TitulosUniversitariosSeeder::class);
        $this->call(DistritoMatriculasSeeder::class);
        $this->call(SituacionRevistasSeeder::class);
        $this->call(SituacionRevistasMotivosSeeder::class);
        $this->call(ConfiguracionMatriculasSeeder::class);
    }
}
