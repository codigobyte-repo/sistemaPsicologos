<?php

namespace App\Http\Controllers;

use App\Models\University;
use Illuminate\Http\Request;

class UniversityController extends Controller
{
    public function index()
    {
        return view('admin.university.index');
    }

    public function create()
    {
        return view('admin.university.create');
    }

    public function edit(University $university)
    {
        return view('admin.university.edit', compact('university'));
    }
}
