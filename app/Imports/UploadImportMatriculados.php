<?php

namespace App\Imports;

use App\Models\User;
use App\Models\TituloUniversitario;
use App\Models\Nationality;
use App\Models\Phone;
use App\Models\DistritoMatriculacionRevista;
use App\Models\Municipality;
use App\Models\University;
use App\Models\Location;
use App\Models\Domicilio;
use App\Models\Matriculado;

use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
/* use Maatwebsite\Excel\Concerns\WithStartRow; */
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UploadImportMatriculados implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $user = new User();
        $user->name = $row[4];
        $user->lastname = $row[5];
        $user->email = $row[26];
        $user->password = Hash::make('password');
        $user->save();

        $tituloUniversitario = new TituloUniversitario();
        $tituloUniversitario->name = $row[28];
        $tituloUniversitario->save();

        $nationality = new Nationality();
        $nationality->pais = $row[11];
        $nationality->save();

        $phoneParticular = new Phone();
        $phoneParticular->tipo = 'PARTICULAR';
        $phoneParticular->numero = $row[17];
        $phoneParticular->save();

        $phoneProfesional = new Phone();
        $phoneProfesional->tipo = 'PROFESIONAL';
        $phoneProfesional->numero = $row[26];
        $phoneProfesional->save();

        $distritoMatriculacionRevista = new DistritoMatriculacionRevista();
        $distritoMatriculacionRevista->name = $row[2];
        $distritoMatriculacionRevista->codigo = $row[3];
        $distritoMatriculacionRevista->save();

        $university = new University();
        $university->name = $row[30];
        $university->address = $row[32];
        $university->titulo_universitario_id = $tituloUniversitario->id;
        $university->save();

        // Crear un domicilio
        $domicilioParticular = new Domicilio();
        $domicilioParticular->tipo = 'PARTICULAR';
        $domicilioParticular->direccion = $row['Dom Particular Direccion'];
        $domicilioParticular->save();

        $domicilioProfesional = new Domicilio();
        $domicilioProfesional->tipo = 'PROFESIONAL';
        $domicilioProfesional->direccion = $row['Dom Profesional Direccion'];
        $domicilioProfesional->save();
    }
}
