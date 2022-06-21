<?php

namespace Juarismi\Base\Models\Common;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    protected $table = 'cm_ciudades';
    public $id = 'idciudad';

    protected $fillable = [
    	'idprovincia', 'codigo', 'nombre', 'latitud', 'longitud'
    ];
}
