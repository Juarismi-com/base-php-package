<?php

namespace Juarismi\Base\Models\Negocio;

use Illuminate\Database\Eloquent\Model;

class ProductoPedido extends Model
{
    protected $table = 'emp_pedido_detalle';
	protected $guarded = array();

	/**
	 * Retorna todos los (items)detalles de un pedidos
	 */
	public function pedidosItemsDetalle(){
		return $this->hasMany(
			'App\Models\Negocio\ProductoPedidoDetalle',
			'id_pedido',
			'id'
		);
	}

	/**
	 * Relacionado a datos del cliente
	 */
	public function cliente(){
		return $this->hasOne(
			'App\Models\Negocio\Cliente',
			'id',
			'id_cliente'
		);
	}



	/**
	 * Retorna la imagen de portada del producto
	 */
	public function imagenPedido(){
		return $this->hasOne(
			'App\Models\Negocio\Imagen',
			'id',
			'imagen'
		);	
	}


	public function funcionario(){
		return $this->hasOne(
			'App\Models\Negocio\Funcionario',
			'id',
			'id_funcionario'
		);	
	}


}
