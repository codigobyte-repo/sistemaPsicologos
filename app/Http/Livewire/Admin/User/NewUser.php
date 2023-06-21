<?php

namespace App\Http\Livewire\Admin\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class NewUser extends Component
{
    public $name, $lastname, $email, $matricula, $password, $password_confirmation;

    public function render()
    {
        return view('livewire.admin.user.new-user');
    }

    public function createUser()
    {
        $validatedData = $this->validate([
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'matricula' => 'required|integer',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'name.required' => 'El campo nombre es obligatorio.',
            'lastname.required' => 'El campo apellido es obligatorio.',
            'email.required' => 'El campo email es obligatorio.',
            'email.email' => 'El campo email debe ser una dirección de correo electrónico válida.',
            'matricula.required' => 'El campo matrícula es obligatorio.',
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'lastname' => $validatedData['lastname'],
            'email' => $validatedData['email'],
            'matricula' => $validatedData['matricula'],
            'password' => Hash::make($validatedData['password']),
        ]);

        return redirect()->route('admin.users.index')->with('message', 'Usuario creado correctamente.');
    }
}
