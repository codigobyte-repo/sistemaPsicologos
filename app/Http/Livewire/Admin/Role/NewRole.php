<?php

namespace App\Http\Livewire\Admin\Role;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class NewRole extends Component
{
    public $selectedPermission = [];
    public $name;

    public function render()
    {
        $permissions = Permission::all();
        return view('livewire.admin.role.new-role', compact('permissions'));
    }

    public function createRol()
    {
        $validatedData = $this->validate([
            'name' => 'required|string|max:255'
        ], [
            'name.required' => 'El campo nombre es obligatorio.'
        ]);

        $role = Role::create([
            'name' => $validatedData['name'],
        ]);

        $role->permissions()->sync($this->selectedPermission);

        return redirect()->route('admin.roles.index')->with('message', 'Rol creado correctamente.');
    
    }
}
