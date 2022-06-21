<?php

namespace Juarismi\Base\Models\Negocio;

use Illuminate\Database\Eloquent\Model;

class ProductoPedidoDetalle extends Model
{
    protected $table = 'producto_pedido_detalle';
	protected $guarded = array();

	// Retorna el producto asociado al detalle
    public function producto(){
    	return $this->belongsTo(
            'App\Models\Negocio\Producto',
            'id_producto',
            'id'
        );
    }



    // Retorna el pedido asociado al detalle
    public function pedido(){
    	return $this->belongsTo('App\Models\Negocio\ProductoPedido');
    }

}
