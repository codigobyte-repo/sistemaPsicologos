<?php

namespace App\Http\Controllers;

use App\Models\precio_servicio;
use Illuminate\Http\Request;

class PrecioServicioController extends Controller
{
    public function index()
    {
        return view('admin.precio-servicios.index');
    }

    public function edit(precio_servicio $precio)
    {
        return view('admin.precio-servicios.edit', compact('precio'));
    }
}
