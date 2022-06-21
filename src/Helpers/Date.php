<?php


/**
 * Limpia la fecha con el urldecode y
 * Retorna la fecha en formato (YYYY-mm-dd)
 * 
 * Si la fecha ya tiene el formato (YYYY-mm-dd) retorna el mismo
 */
if (! function_exists('date_to_DateString')) {

	function date_to_DateString($fecha, $format = 'd/m/Y') {
    	try {
            if (validateDate($fecha))
                return $fecha;

    		return \Carbon\Carbon::createFromFormat(
	                $format, urldecode($fecha)
				)->toDateString();	    			
    	} catch (\Exception $e) {
    		$e->getMessage();
    	}	
    }
}

// Verifica si la fecha es un formato
if (! function_exists('validateDate')){
    function validateDate($fecha, $format = 'Y-m-d')
    {
        $d = DateTime::createFromFormat($format, $fecha);
        return $d && $d->format($format) === $fecha;
    }
}

