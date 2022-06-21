<?php

namespace Juarismi\Base\Models\Negocio;

use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    protected $table = 'emp_sucursales';
    protected $guarded = [];
     
    /**
	 * Relaciona una sucursal a una empresa
	 */
	public function empresa(){
		return $this->belongsTo(
			'Juarismi\Base\Models\Negocio\Empresa',
			'empresa_id',
			'id'
		);	
	}
}
