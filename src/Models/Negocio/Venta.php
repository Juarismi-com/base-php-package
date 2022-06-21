<?php

namespace Juarismi\Base\Models\Negocio;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $table = 'emp_ventas';
	protected $guarded = array();
	protected $fillable = [
	    'serie_factura',
	    'fecha_venta',
	    'condicion_venta',
	    'monto_total',
	    'impuesto_total',
	    'vendedor_id',
	    'cliente_id',
	    'sucursal_id',
	    'razonsocial_id',
	    'comprobantetipo_id',
	    'observacion',
	    'estado',
	    'formapago_id',
	    'atendedor_id',
	    'ruc',
		'razon_social'
	];


	public function cliente(){
		return $this->belongsTo(
			'Juarismi\Base\Models\Negocio\Cliente',
			'cliente_id',
			'id'
		);	
	}


	public function setFechaVentaAttribute($value){
	    $this->attributes['fecha_venta'] =  \Carbon\Carbon::parse($value);
	}

	/**
	 * Detalle de compras (servicios / productos)
	 */
	public function ventaDetalle(){
		return $this->hasMany(
			'Juarismi\Base\Models\Negocio\VentaDetalle',
			'venta_id',
			'id'
		);
	}


	/**
	 * Forma de Pago
	 */
	public function formaPago(){
		return $this->hasOne(
			'Juarismi\Base\Models\Negocio\FormaPago',
			'id',
			'formapago_id'
		);
	}


	/**
	 * Asocia una sucursal 
	 */
	public function sucursal(){
		return $this->belongsTo(
			'Juarismi\Base\Models\Negocio\Sucursal',
			'sucursal_id',
			'id'
		);	
	}

	/**
	 * Procedimientos asociados a una venta
	 */
	// public function procedimientos(){
	// 	return $this->hasMany(
	// 		'Juarismi\Base\Models\Medicina\ProcedimientoDetalle',
	// 		'id_venta',
	// 		'id'
	// 	);	
	// }


	/**
	 * Elimina las cuotas asociadas a una venta
	 */
	// public function pagosRealizados(){
	// 	return $this->hasMany(
	// 		'Juarismi\Base\Models\Cobranza\PagoCuota',
	// 		'id_venta',
	// 		'id'
	// 	);	
	// }
}
