<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => 'Administrador']);
        $role->permissions()->attach([1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19]);

        $role = Role::create(['name' => 'Entrevistador']);
        $role->syncPermissions(['Crear trabajos', 'Ver trabajos', 'Actualizar trabajos', 'Eliminar trabajos']);

        $role = Role::create(['name' => 'Postulante']);
        $role->permissions()->attach([5]);
    }
}
