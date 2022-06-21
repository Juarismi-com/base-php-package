<?php

namespace Juarismi\Base\Models\Negocio;

use Illuminate\Database\Eloquent\Model;

class ImagenSlide extends Model
{
    protected $table = 'imagen_slides';
    protected $guarded = array();


	/**
	 * Retorna la imagen, asociada al slide
	 */
	public function imagenSlide(){
		return $this->hasOne(
			'Juarismi\Base\Models\Negocio\Imagen',
			'id'
		);	
	}
}
