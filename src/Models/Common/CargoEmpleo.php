<?php

namespace Juarismi\Base\Models\Common;

use Illuminate\Database\Eloquent\Model;

class CargoEmpleo extends Model
{
    protected $table = 'emp_cargo_laboral';

    protected $fillable = ['descripcion'];
}
