<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ConfiguracionMatricula;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $datosMatricula = ConfiguracionMatricula::all();
        return view('dashboard', compact('datosMatricula'));
    }
}
