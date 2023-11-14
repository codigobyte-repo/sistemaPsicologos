<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ConfiguracionMatricula;
use App\Models\Matriculado;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $isUserMatriculado = Matriculado::where('user_id', $user->id)->exists();
        return view('dashboard', compact('isUserMatriculado'));
    }
}
