<?php

namespace Juarismi\Base\Models\Negocio;

use Illuminate\Database\Eloquent\Model;

class Salario extends Model
{
    protected $table = 'emp_salario';
	protected $guarded = array();

	/**
	 * Asocia un proveedor por defecto
	 */
	public function funcionario(){
		return $this->belongsTo(
			'Juarismi\Base\Models\Negocio\Funcionario',
			'id_funcionario',
			'id'
		);	
	}


	/**
	 * Usuario que se encargo de crear el usuario
	 */
	public function usuario(){

	}


}
