<?php

namespace App\Http\Controllers;

use App\Imports\UploadImportMatriculados;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class MatriculadoController extends Controller
{
    public function index()
    {
        return view('admin.matriculados.index');
    }

    public function importMatriculados()
    {
        try {
            $filePath = storage_path('app/public/padron.xlsx');
            $data = Excel::import(new UploadImportMatriculados(), $filePath);
            /* dd($data); */

            return "Importación de Matriculados completada exitosamente";
        } catch (\Exception $e) {
            return "Error al importar Matriculados: " . $e->getMessage();
        }
    }
}
