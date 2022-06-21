<?php

namespace Juarismi\Base\Models\Common;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    protected $table = 'cm_paises';
    public $timestamps = false;

    protected $fillable = [
    	'pais'
    ];
}
