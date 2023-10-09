<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class NuevoMatriculado extends Component
{    
    public $nombre_matriculado;
    public $apellido_matriculado;
    public $correo_electronico;
    public $numero_matriculado;

    public function render()
    {
        return view('livewire.nuevo-matriculado');
    }

    public function save()
    {
        // Validar los datos
        $validatedData = $this->validate([
            'nombre_matriculado' => 'required',
            'apellido_matriculado' => 'required',
            'correo_electronico' => 'required|email|unique:users,email',
            'numero_matriculado' => 'required',
        ]);

        // Crear un nuevo usuario
        $user = new User();
        $user->name = $validatedData['nombre_matriculado'];
        $user->lastname = $validatedData['apellido_matriculado'];
        $user->matricula = $this->numero_matriculado;
        $user->email = $validatedData['correo_electronico'];
        $user->password = Hash::make('psicologia');
        $user->save();

        // Obtener el ID del usuario recién creado
        $userId = $user->id;

        
        /* session()->flash('message', 'Usuario creado correctamente.'); */
        return redirect()->route('admin.matriculados.form', [$userId]);
    }
}
