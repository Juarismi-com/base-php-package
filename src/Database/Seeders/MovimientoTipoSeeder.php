<?php

namespace Juarismi\Base\Database\Seeders;


use Illuminate\Database\Seeder;
use Juarismi\Base\Models\Contabilidad\MovimientoTipo;

class MovimientoTipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	
    	// [Motivo concepto , tipo_cuenta]
    	$tipos = [
    		['Salida - Pago Alquileres', 2],
			['Salida - Pago Factura Ande', 2],
			['Salida - Pago Factura Agua', 2],
			['Salida - Pago Otros Servicios', 2],
			['Salida - Pago Vales a Personal', 2],
			['Salida - Pago a Proveedores Varios', 2],
			['Ingreso - Cobros Varios', 1],
			['Salida - Pago de Salarios', 2],
			['Salida - Limpieza', 2],
			['Salida - Pago a Municipalidad', 2],
			['Ingreso - Ingresos Varios', 1],
			['Retiro - Retiro Efectivo Varios', 3],
			['Ingreso - por Ventas', 1],
			['Salida - Por Compra Realizada', 2],
			['Ingreso - Por Cobro de Cuotas Cred.', 1],
			['Salida- Anulacion Cobranza', 2],
			['Salida - Anulacion Venta', 2],
			['Ingreso - Apertura de Caja', 1],
			['Salida- Cierre de Caja', 2],
    	];

    	foreach ($tipos as $tipo) {
    		MovimientoTipo::create([
				'descripcion' => $tipo[0],
				'tipo_cuenta' => $tipo[1]
			]);
    	}

    }
}
