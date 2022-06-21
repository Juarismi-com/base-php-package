<?php

namespace Juarismi\Base\Models\Negocio;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $table = 'emp_stock_existencia';
    protected $guarded = [];

    public function producto(){
		return $this->belongsTo(
			'Juarismi\Base\Models\Negocio\Producto',
			'producto_id',
			'id'
		);	
	}

	public function sucursal(){
		return $this->belongsTo(
			'Juarismi\Base\Models\Negocio\Sucursal',
			'sucursal_id',
			'id'
		);	
	}
}
