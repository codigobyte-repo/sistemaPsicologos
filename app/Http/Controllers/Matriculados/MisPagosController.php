<?php

namespace App\Http\Controllers\Matriculados;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MisPagosController extends Controller
{
    public function index()
    {
        return view('matriculados.mis-pagos.index');
    }
}
