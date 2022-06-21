<?php

namespace Juarismi\Base\Models\Negocio;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empleado extends Model
{
	use SoftDeletes;

	protected $table = 'emp_empleados';
	protected $fillable = [
        'nombre_apellido',
        'ci',
        'ruc',
        'telefono',
        'telefono2',
        'estado',
        'email',
        'direccion',
        'ubicacion_geo',
        'codigo',
        'genero',
        'fecha_ingreso',
        'fecha_nacimiento',
        'cargo_id',
        'user_id',
        'ciudad_id',
    ];

	public function setFechaNacimientoAttribute($value){
	    $this->attributes['fecha_nacimiento'] =  \Carbon\Carbon::parse($value);
	}

	public function setFechaIngresoAttribute($value){
	    $this->attributes['fecha_ingreso'] =  \Carbon\Carbon::parse($value);
	}


	/*public function adelantos(){
		
	}

	public function salarios(){
		return $this->hasMany(
			'Juarismi\Base\Models\Negocio\Salario',
			'id_funcionario',
			'id'
		);			
	}*/


	public function usuario(){
		return $this->belongsTo(
			'App\Models\User',
			'user_id',
			'id'
		);			
	}

}
