<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    public function index()
    {
        return view('admin.area.index');
    }

    public function create()
    {
        return view('admin.area.create');
    }

    public function edit(Area $area)
    {
        return view('admin.area.edit', compact('area'));
    }
}
