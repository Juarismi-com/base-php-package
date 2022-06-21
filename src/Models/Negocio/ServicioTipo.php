<?php

namespace Juarismi\Base\Models\Negocio;

use Illuminate\Database\Eloquent\Model;

class ServicioTipo extends Model
{
    protected $table = 'emp_serviciotipo';
	protected $guarded = array();

	/**
	 * Retorna la imagen de la categoria
	 */
	public function imagenCategoria(){
		return $this->hasOne(
			'Juarismi\Base\Models\Negocio\Imagen',
			'id',
			'imagen'
		);	
	}	


	// Listado de productos asociados al tipo-producto / categoria
	public function productos(){
		return $this->hasMany(
			'Juarismi\Base\Models\Negocio\Producto',
			'tipo_producto',
			'id'
		);	
	}

	// Listado de productos asociados al tipo-producto / categoria
	public function servicios(){
		return $this->hasMany(
			'Juarismi\Base\Models\Negocio\Servicio',
			'tipo_servicio',
			'id'
		);	
	}
}
