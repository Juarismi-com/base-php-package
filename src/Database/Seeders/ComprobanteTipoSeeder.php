<?php

namespace Juarismi\Base\Database\Seeders;


use Illuminate\Database\Seeder;
use Juarismi\Base\Models\Common\ComprobanteTipo;

class ComprobanteTipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $tipos = [
            'FACTURA', 
            'NOTA DE VENTA', 
            'TICKET', 
            'PRESUPUESTO' ,
            'RECIBO'
        ];

		ComprobanteTipo::truncate();
        foreach ($tipos as $key => $value) {
        	$comprobante = new ComprobanteTipo;
        	$comprobante->nombre = $value;
        	$comprobante->save();
        }

    }
}
