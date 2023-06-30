<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ConfiguracionMatricula;
use Illuminate\Http\Request;

class ConfiguracionMatriculaController extends Controller
{
    public function index()
    {
        return view('admin.configuracion.index');
    }

    public function edit(ConfiguracionMatricula $configuracion)
    {
        return view('admin.configuracion.edit', compact('configuracion'));
    }
}
