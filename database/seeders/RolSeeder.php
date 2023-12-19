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
        /* AGREGAR NUEVOS ROLES */
        /* FIRSTORCREATE Esto lo que hace es que al crear un nuevo rol no se tenga que sobrescribir todo de nuevo 
        FirstOrCreate verifica si existe y si esta no lo pisa y agrega el nuevo rol: el comando para ejecutar sólo este seeder 
        es: sail artisan db:seed --class=RolSeeder*/
        

        /* Nombres de los roles Admin, Coordinador, Matriculado */
        $role1 = Role::firstOrCreate(['name' => 'Administrador']);
        $role2 = Role::firstOrCreate(['name' => 'Coordinador']);
        $role3 = Role::firstOrCreate(['name' => 'Contabilidad']);
        
        /* Seccion Admin Dashboard */
        /* ROL GENERAL QUE MUESTRA O OCULTA EL ACCESSO A LA ADMINISTRACIÓN */
        Permission::firstOrCreate(['name' => 'admin.dashboard', 'description' => 'Ver dashboard'])->syncRoles([$role1, $role2, $role3]);
        
        /* Seccion Admin Matriculados */
        
        /* ROL GENERAL QUE MUESTRA O OCULTA TODA LA SECCIÓN MATRICULADOS, USUARIOS Y ROLES */
        Permission::firstOrCreate(['name' => 'admin.matriculados.usuarios.roles', 'description' => 'Ver sección de matriculados, usuarios y roles'])->syncRoles([$role1, $role2]);

        Permission::firstOrCreate(['name' => 'admin.matriculados.index', 'description' => 'Ver Listado de matriculados'])->syncRoles([$role1, $role2]);
        Permission::firstOrCreate(['name' => 'admin.matriculados.create', 'description' => 'Crear nuevo matriculado'])->syncRoles([$role1]);
        Permission::firstOrCreate(['name' => 'admin.matriculados.form', 'description' => 'Editar matriculados'])->syncRoles([$role1, $role2]);
        /* Eliminar.Datatable.Matriculado se usa para ocultar el botón de eliminar matriculado del datatble */
        Permission::firstOrCreate(['name' => 'Eliminar.Datatable.Matriculado', 'description' => 'Eliminar matriculado'])->syncRoles([$role1]);
        Permission::firstOrCreate(['name' => 'importMatriculados', 'description' => 'Importación masiva de matriculados'])->syncRoles([$role1]);

        /* Seccion Admin Usuarios */
        Permission::firstOrCreate(['name' => 'admin.users.index', 'description' => 'Ver listado de usuarios'])->syncRoles([$role1, $role2]);
        Permission::firstOrCreate(['name' => 'admin.users.create', 'description' => 'Crear nuevo usuario'])->syncRoles([$role1]);
        Permission::firstOrCreate(['name' => 'admin.users.edit', 'description' => 'Editar usuario'])->syncRoles([$role1]);
        Permission::firstOrCreate(['name' => 'Eliminar.Datatable.Usuario', 'description' => 'Eliminar usuario'])->syncRoles([$role1]);


        /* ROL DE LA SECCION CONFIGURACIONES MUESTRA O OCULTA UNIVESIDADES, LOCALIDADES, MUNICIPIOS, REVSITAS, ETC */
        Permission::firstOrCreate(['name' => 'admin.configuraciones', 'description' => 'Ver Configuraciones'])->syncRoles([$role1, $role2]);

        /* Seccion Admin Universidades */
        Permission::firstOrCreate(['name' => 'admin.universidades.index', 'description' => 'Ver listado de universidades'])->syncRoles([$role1, $role2]);
        Permission::firstOrCreate(['name' => 'admin.universidades.create', 'description' => 'Crear nueva universidad'])->syncRoles([$role1]);
        Permission::firstOrCreate(['name' => 'admin.universidades.edit', 'description' => 'Editar universidad'])->syncRoles([$role1]);
        Permission::firstOrCreate(['name' => 'Eliminar.Datatable.Universidad', 'description' => 'Eliminar universidad'])->syncRoles([$role1]);

        /* Seccion Admin Localidad */
        Permission::firstOrCreate(['name' => 'admin.localidades.index', 'description' => 'Ver listado de localidades'])->syncRoles([$role1, $role2]);
        Permission::firstOrCreate(['name' => 'admin.localidades.create', 'description' => 'Crear nueva localidad'])->syncRoles([$role1]);
        Permission::firstOrCreate(['name' => 'admin.localidades.edit', 'description' => 'Editar localidad'])->syncRoles([$role1]);
        Permission::firstOrCreate(['name' => 'Eliminar.Datatable.Localidad', 'description' => 'Eliminar localidad'])->syncRoles([$role1]);

        /* Seccion Admin Areas */
        Permission::firstOrCreate(['name' => 'admin.areas.index', 'description' => 'Ver listado de áreas'])->syncRoles([$role1, $role2]);
        Permission::firstOrCreate(['name' => 'admin.areas.create', 'description' => 'Crear nueva área'])->syncRoles([$role1]);
        Permission::firstOrCreate(['name' => 'admin.areas.edit', 'description' => 'Editar área'])->syncRoles([$role1]);
        Permission::firstOrCreate(['name' => 'Eliminar.Datatable.Area', 'description' => 'Eliminar área'])->syncRoles([$role1]);

        /* Seccion Admin Revistas */
        Permission::firstOrCreate(['name' => 'admin.revistas.index', 'description' => 'Ver listado de revistas'])->syncRoles([$role1, $role2]);
        Permission::firstOrCreate(['name' => 'admin.revistas.create', 'description' => 'Crear nueva revista'])->syncRoles([$role1]);
        Permission::firstOrCreate(['name' => 'admin.revistas.edit', 'description' => 'Editar revista'])->syncRoles([$role1]);
        Permission::firstOrCreate(['name' => 'Eliminar.Datatable.Revista', 'description' => 'Eliminar revista'])->syncRoles([$role1]);

        /* Seccion Admin Revistas Motivos */
        Permission::firstOrCreate(['name' => 'admin.revistas-motivos.index', 'description' => 'Ver listado de revitas motivos'])->syncRoles([$role1, $role2]);
        Permission::firstOrCreate(['name' => 'admin.revistas-motivos.create', 'description' => 'Crear nueva revita motivo'])->syncRoles([$role1]);
        Permission::firstOrCreate(['name' => 'admin.revistas-motivos.edit', 'description' => 'Editar revita motivo'])->syncRoles([$role1]);
        Permission::firstOrCreate(['name' => 'Eliminar.Datatable.Revista-Motivos', 'description' => 'Eliminar revita motivo'])->syncRoles([$role1]);

        /* Seccion Admin Configuración Matriculas */
        Permission::firstOrCreate(['name' => 'admin.configuracion-matricula', 'description' => 'Ver fechas y precios matricula'])->syncRoles([$role1]);
        Permission::firstOrCreate(['name' => 'admin.configuracion-matricula.edit', 'description' => 'Configurar fechas y precios matricula'])->syncRoles([$role1]);

        /* Seccion Admin Control de pagos */
        /* ROL GENERAL QUE MUESTRA O OCULTA TODA LA SECCIÓN DE PAGOS */
        Permission::firstOrCreate(['name' => 'admin.control-pagos.index', 'description' => 'Ver control de pagos'])->syncRoles([$role1, $role2, $role3]);

        Permission::firstOrCreate(['name' => 'admin.control-pagos.edit', 'description' => 'Cambiar estados de pagos'])->syncRoles([$role1, $role2, $role3]);
        Permission::firstOrCreate(['name' => 'admin.comprobantes', 'description' => 'Ver comprobantes de pago'])->syncRoles([$role1, $role2, $role3]);
        Permission::firstOrCreate(['name' => 'admin.generar-pdf', 'description' => 'Generar comprobantes de pago'])->syncRoles([$role1, $role2, $role3]);

        /* Seccion Admin Precios de servicios */
        Permission::firstOrCreate(['name' => 'admin.precio-servicios', 'description' => 'Ver precios de servicios'])->syncRoles([$role1, $role2]);
        Permission::firstOrCreate(['name' => 'admin.precio-servicios.edit', 'description' => 'Editar precios de servicios'])->syncRoles([$role1]);

        /* Seccion de envio de notificaciones */
        Permission::firstOrCreate(['name' => 'admin.messages', 'description' => 'Envía notificaciones'])->syncRoles([$role1, $role2]);
    }
}
