<?php

namespace App\Http\Controllers;

use App\Imports\UploadImportMatriculados;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class MatriculadoController extends Controller
{
    public function index()
    {
        return view('admin.matriculados.index');
    }

    /* Funcionalidad para Importar los matriculados */
    public function importMatriculados()
    {
        try {
            $filePath = storage_path('app/public/padron.xlsx');
            $data = Excel::import(new UploadImportMatriculados(), $filePath);

            return "Importación de Matriculados completada exitosamente";
        } catch (\Exception $e) {
            return "Error al importar Matriculados: " . $e->getMessage();
        }
    }

    public function create()
    {
        return view('admin.matriculados.create');
    }

    public function form($userId)
    {
        $municipios = "";
        $user = User::findOrFail($userId);
        return view('admin.matriculados.form', compact('user', 'municipios'));
    }
}
