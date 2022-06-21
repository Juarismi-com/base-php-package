<?php

namespace Juarismi\Base\Models\Negocio;

use Illuminate\Database\Eloquent\Model;

class PresupuestoDetalle extends Model
{
    protected $table = 'emp_presupuesto_detalle';
    protected $guarded = [];

    public function presupuesto(){
		return $this->belongsTo(
			'Juarismi\Base\Models\Negocio\Presupuesto',
			'presupuesto_id',
			'id'
		);	
	}

	public function producto(){
		return $this->hasOne(
			'Juarismi\Base\Models\Negocio\Producto',
			'id',
			'producto_id'
		);	
	}


	/**
	 * Detalle de orden de compra
	 */
	/*public function ocDetalle(){
		return $this->hasMany(
			'Juarismi\Base\Models\TallerMecanico\OrdenCompraDetalle',
			'presupuestodetalle_id',
			'id'
		);
	}*/

	/**
	 * Listado de Orden de Compra por presupuesto detalle (row)
	 */
	// public function ocDetalleList(){
	// 	return $this->hasManyThrough(
	// 		'Juarismi\Base\Models\TallerMecanico\OrdenCompraDetalle', 
	// 		'Juarismi\Base\Models\Negocio\Producto',
	// 		'producto_id',
	// 		'producto_id',
	// 		'id',
	// 		'id'
	// 	);
	// }
}
