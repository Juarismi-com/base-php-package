<?php

namespace Juarismi\Base\Models\Negocio;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Compra extends Model
{
	use SoftDeletes;
	
    protected $table = 'emp_compras';
	protected $guarded = array();

	/**
	 * Asocia un proveedor por defecto
	 */
	public function proveedor(){
		return $this->belongsTo(
			'Juarismi\Base\Models\Negocio\Proveedor',
			'proveedor_id',
			'id'
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
	 * Detalle de compras (productos)
	 */
	public function compraDetalle(){
		return $this->hasMany(
			'Juarismi\Base\Models\Negocio\CompraDetalle',
			'compra_id',
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
     * The "booted" method of the model.
     *
     * @return void
     */
	protected static function booted(){}

}
