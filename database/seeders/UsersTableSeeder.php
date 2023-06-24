<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Martin',
            'lastname' => 'Aquino',
            'email' => 'maquino@codigobyte.com.ar',
            'matricula' => 1111,
            'password' => Hash::make('Maquino*2030'),
        ])->assignRole('Administrador');
    }
}
