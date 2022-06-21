<?php

namespace Juarismi\Base\Models\Negocio;

use Illuminate\Database\Eloquent\Model;

class Presupuesto extends Model
{
    protected $table = 'emp_presupuestos';
 	protected $guarded = array();


	public function cliente(){
		return $this->belongsTo(
			'Juarismi\Base\Models\Negocio\Cliente',
			'cliente_id',
			'id'
		);	
	}

	/**
	 * Detalle de compras (servicios / productos)
	 */
	public function presupuestoDetalle(){
		return $this->hasMany(
			'Juarismi\Base\Models\Negocio\PresupuestoDetalle',
			'presupuesto_id',
			'id'
		);
	}

	/**
	 * Detalle de orden de compra
	 */
	/*public function ocDetalle(){
		return $this->hasMany(
			'App\Models\TallerMecanico\OrdenCompraDetalle',
			'presupuesto_id',
			'id'
		);
	}*/
	
}
