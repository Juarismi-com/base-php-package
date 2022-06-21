<?php

namespace Juarismi\Base\Models\Negocio;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
	use SoftDeletes;
	
	protected $table = 'emp_clientes';
	protected $fillable = [
        'nombre',
        'telefono',
        'telefono2',
        'email',
        'ruc',
        'ci',
        'direccion',
        'genero',
        'fecha_ingreso',
        'fecha_nacimiento',
        'tipo_cliente',
        'limite_cta_cte',
        'saldo',
        'ciudad_id',
        'ubicacion_geo',
        'estado',
    ];

	public function setFechaNacimientoAttribute($value){
	    $this->attributes['fecha_nacimiento'] =  \Carbon\Carbon::parse($value);
	}

	public function setFechaIngresoAttribute($value){
	    $this->attributes['fecha_ingreso'] =  \Carbon\Carbon::parse($value);
	}



}
