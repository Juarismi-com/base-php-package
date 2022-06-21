<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Juarismi\Base\Models\Negocio\FormaPago;

class FormaPagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $forma_pago_list = [
        	'Efectivo', 'Cheque', 'Fin. Bancaria', 'Fin. Propia', 
        	'Tarjeta de Credito',  'Tarjeta de Debito', 'Aso. Empleados',
        	'Otro'
        ];

        FormaPago::truncate();
        foreach ($forma_pago_list as $forma_pago) {
        	FormaPago::create(['descripcion' => $forma_pago]);
        }
    }
}
