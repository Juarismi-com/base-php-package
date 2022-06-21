<?php

use Illuminate\Support\Facades\Route;

Route::name('jBase.')
	->namespace('Juarismi\Base\Http\Controllers')
	->middleware(['cors', 'api'])
	->group(function(){

	Route::get('/base', function() {
	    return 'juarismi/base - api';
	});


	// Ventas
	Route::post('ventas/confirmar-venta', 'VentaController@confirmarVenta');

	// Compras
	Route::put('compras/{id}/confirmar', 'CompraController@confirmar');	

	Route::delete(
		'compra-detalle/eliminar-varios', 
		'CompraDetalleController@eliminarVarios'
	);		

	// Productos / Servicios
	Route::get(
		'servicios/{id}/restaurar', 
		'ServicioController@restaurar');

	Route::get(
		'sucursales/{id}/comprobante-tipo', 
		'SucursalController@get_comprobante_tipo'
	);
	Route::get(
		'productos/{codigo_barra}/codigo-barras', 
		'ProductoController@get_por_codigo_barras'
	);

	Route::apiResources([
	    // 'servicios' => 'ServicioController',
	    // 'egreso-tipo' => 'EgresoTipoController',
	    // 'egresos' => 'EgresoController',
	    // 'agenda-cita' => 'AgendaCitaController',
	    // //'adjuntos' => 'AdjuntoController',
	    // 'adelanto-salario' => 'AdelantoSalarioController',
	    // 'salarios' => 'SalarioController',

	    // v2
	    //'personas' => 'ClienteController',
	    'clientes' => 'ClienteController',
	    'empresas' => 'EmpresaController',
	    'proveedores' => 'ProveedorController',
	    'productos' => 'ProductoController',
	    'tipo-comprobante' => 'ComprobanteTipoController',
	    'stock' => 'StockController',
	    'empleados' => 'EmpleadoController',
	    'compras' => 'CompraController',
	    'compra-detalle' => 'CompraDetalleController',
	    'ventas' => 'VentaController',
	    'venta-detalle' => 'VentaDetalleController',
	    'presupuestos' => 'PresupuestoController',
	    'sucursales' => 'SucursalController',
	    'tipo-producto' => 'ProductoTipoController',
	    'comprobante-x-sucursal' => 'ComprobantePorSucursalController',
	    'cierre-caja' => 'CierreCajaController',
	    'forma-pago' => 'FormaPagoController'
	]);

	// Contable
	Route::namespace('Contabilidad')
		// ->middleware('auth:api')
		->prefix('contabilidad')
		->group(function(){
		
		Route::apiResources([
			'movimientos' => 'MovimientoController',
			'movimiento-tipo' => 'MovimientoTipoController'
		]);
	});



});

