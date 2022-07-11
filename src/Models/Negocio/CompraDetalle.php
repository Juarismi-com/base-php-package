<?php

namespace Juarismi\Base\Models\Negocio;

use Illuminate\Database\Eloquent\Model;
use App\Events\AumentarStockEvent;

class CompraDetalle extends Model
{
  protected $table = 'emp_compra_detalle';
	protected $guarded = [];

	public function compra(){
		return $this->belongsTo(
			'App\Models\Negocio\Compra',
			'compra_id',
			'id'
		);	
	}

	public function producto(){
		return $this->hasOne(
			'App\Models\Negocio\Producto',
			'id',
			'producto_id'
		);	
	}
	
}
