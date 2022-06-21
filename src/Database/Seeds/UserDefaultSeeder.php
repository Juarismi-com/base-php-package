<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Juarismi\Auth\Models\User;

class UserDefaultSeeder extends Seeder
{
    /**
     * Genera y asocia los siguientes tipos de socios
     * 
     * superadmin
     * socio
     * por-aprobar
     * admision
     * tesoreria
     * gestion
     *
     * @return void
     */
    public function run()
    {	
            
    	// superadmin
        $user = User::create([
            'name' => 'Super Usuario',
            'email' => 'superadmin@juarismi.com',
            'password' => bcrypt('superadmin123')
        ]);
        $user->assignRole('superadmin');

        // secretaria
        $user = User::create([
            'name' => 'Secreataria',
            'email' => 'secretaria@juarismi.com',
            'password' => bcrypt('superadmin123')
        ]);
        $user->assignRole('secretaria');


    }
}
