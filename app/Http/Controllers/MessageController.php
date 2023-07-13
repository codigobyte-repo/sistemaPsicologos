<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        return view('admin.message.index');
    }

    public function show(Message $message)
    {
        return view('admin.message.show', compact('message'));
    }
    
    public function store(Request $request)
    {
        
    }
}
