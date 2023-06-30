<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pago;
use Illuminate\Http\Request;

class ControlPagos extends Controller
{
    public function index()
    {
        return view('admin.control-pagos.index');
    }

    public function edit(Pago $pago)
    {
        return view('admin.control-pagos.edit', compact('pago'));
    }
}
