<?php

namespace App\Http\Controllers;

use App\Models\SituacionRevistaMotivo;
use Illuminate\Http\Request;

class SituacionRevistaMotivoController extends Controller
{
    public function index()
    {
        return view('admin.motivo.index');
    }

    public function create()
    {
        return view('admin.motivo.create');
    }

    public function edit(SituacionRevistaMotivo $motivo)
    {
        return view('admin.motivo.edit', compact('motivo'));
    }
}
