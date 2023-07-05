<?php

namespace App\Http\Livewire\Admin\User;

use Spatie\Permission\Models\Role;
use App\Models\User;
use Livewire\Component;

class EditUser extends Component
{
    public $user;
    public $name, $lastname, $email, $matricula, $dni;
    
    public $selectedRoles = [];
    public function mount(User $user)
    {
        $this->user = $user;
        $this->name = $user->name;
        $this->lastname = $user->lastname;
        $this->email = $user->email;
        $this->matricula = $user->matricula;
        $this->dni = $user->dni;

        $this->selectedRoles = $user->roles->pluck('id')->toArray();
    }

    public function update()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'matricula' => ['required_without:dni'], // requerido si no se proporciona el DNI
            'dni' => ['required_without:matricula'], // requerido si no se proporciona la matrícula
        ], [
            'name.required' => 'El campo nombre es obligatorio.',
            'lastname.required' => 'El campo apellido es obligatorio.',
            'email.required' => 'El campo email es obligatorio.',
            'email.email' => 'El campo email debe ser una dirección de correo electrónico válida.',
        ]);

        User::where('id', $this->user->id)->update($validatedData);

        // Actualizar los roles del usuario
        $user = User::find($this->user->id);
        $user->roles()->sync($this->selectedRoles);

        return redirect()->route('admin.users.index')->with('message', 'Los datos del usuario se actualizaron correctamente.');
    }

    public function render()
    {
        $roles = Role::all();
        return view('livewire.admin.user.edit-user', compact('roles'));
    }
}
