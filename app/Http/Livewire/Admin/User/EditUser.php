<?php

namespace App\Http\Livewire\Admin\User;

use App\Models\User;
use Livewire\Component;

class EditUser extends Component
{
    public $user;
    public $name, $lastname, $email, $matricula;

    public function mount(User $user)
    {
        $this->user = $user;
        $this->name = $user->name;
        $this->lastname = $user->lastname;
        $this->email = $user->email;
        $this->matricula = $user->matricula;
    }

    public function update()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'matricula' => 'required',
        ], [
            'name.required' => 'El campo nombre es obligatorio.',
            'lastname.required' => 'El campo apellido es obligatorio.',
            'email.required' => 'El campo email es obligatorio.',
            'email.email' => 'El campo email debe ser una dirección de correo electrónico válida.',
            'matricula.required' => 'El campo matrícula es obligatorio.',
        ]);

        User::where('id', $this->user->id)->update($validatedData);

        return redirect()->route('admin.users.index')->with('message', 'Los datos del usuario se actualizaron correctamente.');
    }

    public function render()
    {
        return view('livewire.admin.user.edit-user');
    }
}
