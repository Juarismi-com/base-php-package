<?php

namespace Juarismi\Base\Models\Contabilidad;

use Illuminate\Database\Eloquent\Model;

class Movimiento extends Model
{
    protected $table = 'cont_movimientos';
    protected $guarded = [];

    /**
	 * Retorna la ficha odotonlogica del paciente
	 */
	public function movimientoTipo(){
		return $this->hasOne(
			MovimientoTipo::class,
			'id',
			'movimientotipo_id'
		);			
	}
}
