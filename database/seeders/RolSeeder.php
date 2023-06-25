<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /* Nombres de los roles Admin, Coordinador, Matriculado */
        $role1 = Role::create(['name' => 'Administrador']);
        $role2 = Role::create(['name' => 'Coordinador']);
        
        /* Seccion Admin Dashboard */
        Permission::create(['name' => 'admin.dashboard', 'description' => 'Ver dashboard'])->syncRoles([$role1, $role2]);
        
        /* Seccion Admin Matriculados */
        Permission::create(['name' => 'admin.matriculados.index', 'description' => 'Ver Listado de matriculados'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.matriculados.create', 'description' => 'Crear nuevo matriculado'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.matriculados.form', 'description' => 'Editar matriculados'])->syncRoles([$role1, $role2]);
        /* Eliminar.Datatable.Matriculado se usa para ocultar el botón de eliminar matriculado del datatble */
        Permission::create(['name' => 'Eliminar.Datatable.Matriculado', 'description' => 'Eliminar matriculado'])->syncRoles([$role1]);
        Permission::create(['name' => 'importMatriculados', 'description' => 'Importación masiva de matriculados'])->syncRoles([$role1]);

        /* Seccion Admin Usuarios */
        Permission::create(['name' => 'admin.users.index', 'description' => 'Ver listado de usuarios'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.users.create', 'description' => 'Crear nuevo usuario'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.users.edit', 'description' => 'Editar usuario'])->syncRoles([$role1]);
        Permission::create(['name' => 'Eliminar.Datatable.Usuario', 'description' => 'Eliminar usuario'])->syncRoles([$role1]);

        /* Seccion Admin Universidades */
        Permission::create(['name' => 'admin.universidades.index', 'description' => 'Ver listado de universidades'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.universidades.create', 'description' => 'Crear nueva universidad'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.universidades.edit', 'description' => 'Editar universidad'])->syncRoles([$role1]);
        Permission::create(['name' => 'Eliminar.Datatable.Universidad', 'description' => 'Eliminar universidad'])->syncRoles([$role1]);

        /* Seccion Admin Localidad */
        Permission::create(['name' => 'admin.localidades.index', 'description' => 'Ver listado de localidades'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.localidades.create', 'description' => 'Crear nueva localidad'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.localidades.edit', 'description' => 'Editar localidad'])->syncRoles([$role1]);
        Permission::create(['name' => 'Eliminar.Datatable.Localidad', 'description' => 'Eliminar localidad'])->syncRoles([$role1]);

        /* Seccion Admin Areas */
        Permission::create(['name' => 'admin.areas.index', 'description' => 'Ver listado de áreas'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.areas.create', 'description' => 'Crear nueva área'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.areas.edit', 'description' => 'Editar área'])->syncRoles([$role1]);
        Permission::create(['name' => 'Eliminar.Datatable.Area', 'description' => 'Eliminar área'])->syncRoles([$role1]);

        /* Seccion Admin Revistas */
        Permission::create(['name' => 'admin.revistas.index', 'description' => 'Ver listado de revistas'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.revistas.create', 'description' => 'Crear nueva revista'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.revistas.edit', 'description' => 'Editar revista'])->syncRoles([$role1]);
        Permission::create(['name' => 'Eliminar.Datatable.Revista', 'description' => 'Eliminar revista'])->syncRoles([$role1]);

        /* Seccion Admin Revistas Motivos */
        Permission::create(['name' => 'admin.revistas-motivos.index', 'description' => 'Ver listado de revitas motivos'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.revistas-motivos.create', 'description' => 'Crear nueva revita motivo'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.revistas-motivos.edit', 'description' => 'Editar revita motivo'])->syncRoles([$role1]);
        Permission::create(['name' => 'Eliminar.Datatable.Revista-Motivos', 'description' => 'Eliminar revita motivo'])->syncRoles([$role1]);
    }
}
