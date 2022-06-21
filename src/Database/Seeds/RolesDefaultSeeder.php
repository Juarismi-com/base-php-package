<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesDefaultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'superadmin']);
        Role::create(['name' => 'comercio']); // (administración y finanzas)
        Role::create(['name' => 'supermercado']);
        Role::create(['name' => 'secretaria']);
        Role::create(['name' => 'taller-mecanico']);
        Role::create(['name' => 'odontologo']);
        Role::create(['name' => 'asociacion']);
        Role::create(['name' => 'secretaria']);
    }
}
