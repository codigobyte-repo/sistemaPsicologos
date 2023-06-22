<?php

namespace App\Http\Controllers;

use App\Models\SituacionRevista;
use Illuminate\Http\Request;

class SituacionRevistaController extends Controller
{
    public function index()
    {
        return view('admin.situacion.index');
    }

    public function create()
    {
        return view('admin.situacion.create');
    }

    public function edit(SituacionRevista $revista)
    {
        return view('admin.situacion.edit', compact('revista'));
    }
}
