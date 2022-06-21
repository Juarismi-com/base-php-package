<?php

namespace Juarismi\Base\Models\Negocio;

use Illuminate\Database\Eloquent\Model;

class ComprobantePorSucursal extends Model
{
    protected $table = 'emp_comprobante_emitido';
    protected $guarded = [];

    public function sucursal(){
    	return $this->hasOne(
    		'Juarismi\Base\Models\Negocio\Sucursal', 
    		'id',
    		'sucursal_id'
    	);
    }

    public function comprobante_tipo(){
    	return $this->hasOne(
    		'Juarismi\Base\Models\Common\ComprobanteTipo', 
    		'id',
    		'comprobantetipo_id'
    	);
    }

}
