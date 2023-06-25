<?php

namespace App\Http\Livewire\Admin\Role;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class ListRole extends Component
{
    public function render()
    {
        $roles = Role::all();
        return view('livewire.admin.role.list-role', compact('roles'));
    }

    public function eliminar(Role $rol)
    {
        $rol->delete();
        return redirect()->route('admin.roles.index')->with('message', 'Rol eliminado correctamente.');
    }
}
