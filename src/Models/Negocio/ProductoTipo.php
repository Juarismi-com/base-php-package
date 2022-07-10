<?php

namespace Juarismi\Base\Models\Negocio;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductoTipo extends Model
{
  use SoftDeletes;

  protected $table = 'emp_producto_tipo';
	protected $fillable = [
    'nombre',
    'codigo',
    'slug',
    'estado',
    'parent_id'
  ];

  /**
  *Listado de productos relacionados a un tipo
  *
  * @return \Illuminate\Database\Eloquent\Relations\HasMany
  */
  public function productos(): HasMany
  {
    return $this->hasMany(
      Juarismi\Base\Models\Negocio\Producto::class, 
      'productotipo_id', 
      'id'
    );
  }
}
