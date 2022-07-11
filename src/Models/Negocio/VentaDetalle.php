<?php

namespace Juarismi\Base\Models\Negocio;

use Illuminate\Database\Eloquent\Model;

class VentaDetalle extends Model
{
  protected $table = 'emp_venta_detalle';
	protected $guarded = array();

	public function venta(){
		return $this->belongsTo(
			'Juarismi\Base\Models\Negocio\Venta',
			'venta_id',
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
   * The "booted" method of the model.
   *
   * @return void
   */
	protected static function booted(){}

}
