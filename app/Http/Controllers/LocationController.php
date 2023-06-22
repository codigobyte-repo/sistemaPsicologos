<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index()
    {
        return view('admin.location.index');
    }

    public function create()
    {
        return view('admin.location.create');
    }

    public function edit(Location $localidad)
    {
        return view('admin.location.edit', compact('localidad'));
    }
}
