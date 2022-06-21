<?php


/**
 * Convierte booleano a string en español "verdadero" o "falso"
 */ 
if (!function_exists('boolean_to_string')) {
	function boolean_to_string($_bool){
		return $_bool ? 'verdadero ' : 'falso';
	}
}


/**
 * Convierte booleano a si fue o no realizado
 */
if (! function_exists('boolean_to_realizado')) {
	function boolean_to_realizado($_bool){
		return $_bool ? ' se realizado' : ' no fue realizado';
	}
}


/**
 * Verifica si contiene los atributos de lat y lng de geoubicacion
 * 
 * Retorna el array o NULL en caso que los atributos no esten inicializados 
 */
if (! function_exists('es_geoubicacion')) {
	function es_geoubicacion($geoubicacion){
		if (isset($geoubicacion['lat']) && isset($geoubicacion['lng'])){
			return $geoubicacion;
		} 

		return NULL;
	}
}


/**
 * Convierte a json si existe la ubicacion
 * 
 * @return NULL|String - Json Encode
 */ 
if (!function_exists('geo_to_json')){
	function geo_to_json($geoubicacion) {
		if (es_geoubicacion($geoubicacion) == NULL) 
			return NULL;

		return json_encode($geoubicacion);
	}
}




?>