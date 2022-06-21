<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class BaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RolesDefaultSeeder::class,
            UserDefaultSeeder::class,
            PaisesSeeder::class,
            CiudadesSeeder::class,
            CurrenciesSeeder::class,
            ComprobanteTipoSeeder::class,
            FormaPagoSeeder::class,
            MovimientoTipoSeeder::class
        ]);
    }
}
