<?php

namespace App\Http\Livewire\Admin\Role;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class EditRole extends Component
{
    public $role, $name;
    public $selectedPermission = [];

    public function mount(Role $role)
    {
        $this->role = $role;
        $this->name = $role->name;
        $this->selectedPermission = $role->permissions->pluck('id')->toArray();
    }

    public function render()
    {
        $permissions = Permission::all();
        return view('livewire.admin.role.edit-role', compact('permissions'));
    }

    public function updateRol()
    {

        $validatedData = $this->validate([
            'name' => 'required|string|max:255'
        ], [
            'name.required' => 'El campo nombre es obligatorio.'
        ]);

        $this->role->name = $validatedData['name'];

        $this->role->permissions()->sync($this->selectedPermission);

        $this->role->save();

        return redirect()->route('admin.roles.index')->with('message', 'Rol actualizado correctamente.');
    }
}
