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
        Permission::create(['name' => 'admin.dashboard'])->syncRoles([$role1, $role2]);
        
        /* Seccion Admin Matriculados */
        Permission::create(['name' => 'admin.matriculados.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.matriculados.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.matriculados.form'])->syncRoles([$role1, $role2]);
        /* Eliminar.Datatable.Matriculado se usa para ocultar el botón de eliminar matriculado del datatble */
        Permission::create(['name' => 'Eliminar.Datatable.Matriculado'])->syncRoles([$role1]);
        Permission::create(['name' => 'ImportarMatriculado'])->syncRoles([$role1]);

        /* Seccion Admin Usuarios */
        Permission::create(['name' => 'admin.users.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.users.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.users.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'Eliminar.Datatable.Usuario'])->syncRoles([$role1]);

        /* Seccion Admin Universidades */
        Permission::create(['name' => 'admin.universidades.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.universidades.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.universidades.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'Eliminar.Datatable.Universidad'])->syncRoles([$role1]);

        /* Seccion Admin Localidad */
        Permission::create(['name' => 'admin.localidades.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.localidades.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.localidades.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'Eliminar.Datatable.Localidad'])->syncRoles([$role1]);

        /* Seccion Admin Areas */
        Permission::create(['name' => 'admin.areas.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.areas.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.areas.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'Eliminar.Datatable.Area'])->syncRoles([$role1]);

        /* Seccion Admin Revistas */
        Permission::create(['name' => 'admin.revistas.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.revistas.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.revistas.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'Eliminar.Datatable.Revista'])->syncRoles([$role1]);

        /* Seccion Admin Revistas Motivos */
        Permission::create(['name' => 'admin.revistas-motivos.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.revistas-motivos.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.revistas-motivos.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'Eliminar.Datatable.Revista-Motivos'])->syncRoles([$role1]);


    }
}
