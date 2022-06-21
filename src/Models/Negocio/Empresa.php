<?php

namespace Juarismi\Base\Models\Negocio;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = 'emp_empresas';
    protected $guarded = [];

    /**
	 * Listado de sucursales de una empresa
	 */
	public function sucursales(){
		return $this->hasMany(
			'Juarismi\Base\Models\Negocio\Sucursal',
			'empresa_id',
			'id'
		);
	}
}
