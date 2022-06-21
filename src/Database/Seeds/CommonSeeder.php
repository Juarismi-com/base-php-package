<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class CommonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'superadmin']);

        $this->call(UserDefaultSeeder::class);
        $this->call(PaisesSeeder::class);
        $this->call(CiudadesSeeder::class);
        $this->call(CurrenciesSeeder::class);
        $this->call(ComprobanteTipoSeeder::class);
        $this->call(FormaPagoSeeder::class);
        $this->call(MovimientoTipoSeeder::class);
    }
}
