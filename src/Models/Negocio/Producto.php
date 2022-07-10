<?php

namespace Juarismi\Base\Models\Negocio;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
  use SoftDeletes;

  protected $table = 'emp_productos';
	protected $fillable = [
    'nombre',
    'descripcion',
    'presentacion',
    'fecha_publicacion',
    'publicador_id',
    'productotipo_id',
    'marca_id',
    'Modelso_id',
    'imagen_path',
    'estado',
    'codigo',
    'codigo_externo',
    'codigo_barras',
    'precio_vta',
    'precio_vta2',
    'precio_vta3',
    'precio_vta4',
    'precio_vta5',
    'precio_compra',
    'iva',
    'moneda_id',
  ];

    
	public function marca(){
		return $this->hasOne(
			'Juarismi\Base\Models\Negocio\Marca',
			'id',
			'marca_id'
		);	
	}


	public function tipoProducto(){
		return $this->hasOne(
			'Juarismi\Base\Models\Negocio\ProductoTipo',
			'id',
			'productotipo_id'
		);	
	}

	// Orden de compra detalle
	/*public function ocDetalle(){
		return $this->hasOne(
			'Juarismi\Base\Models\TallerMecanico\OrdenCompraDetalle',
			'id',
			'producto_id'
		);	
	}*/
}
