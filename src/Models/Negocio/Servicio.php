<?php

namespace Juarismi\Base\Models\Negocio;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $table = 'emp_servicio';
	protected $guarded = array();

	/**
	 * Asociacion al TipoProducto
	 */
	public function tipoServicio(){
		return $this->belongsTo(
			'Juarismi\Base\Models\Negocio\ServicioTipo',
			'tipo_servicio'
		);
	}

	/**
	 * Retorna la imagen de portada del producto
	 */
	public function imagenPortada(){
		return $this->hasOne(
			'Juarismi\Base\Models\Negocio\Imagen',
			'id',
			'imagen_portada'
		);	
	}


	/**
	 * Listado de servicio que fueron comprados
	 */
	public function compraDetalle(){
		return $this->hasMany(
			'Juarismi\Base\Models\Negocio\CompraDetalle',
			'id_servicio',
			'id'
		);	
	}


	/**
	 * Listado de servicio que fueron vendidos
	 */
	public function ventaDetalle(){
		return $this->hasMany(
			'Juarismi\Base\Models\Negocio\VentaDetalle',
			'id_servicio',
			'id'
		);	
	}
	
}
