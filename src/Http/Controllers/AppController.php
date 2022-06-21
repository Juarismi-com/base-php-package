<?php

namespace Juarismi\Base\Http\Controllers;

use App\Http\Controllers\Controller;

class AppController extends Controller
{
	protected function serverError(\Exception $e){
		$code = $e->getCode() == NULL ? 500 : $e->getCode();
		return response([ 
			'message' => $e->getMessage(),
			'code' => $code,
			'raw' => $e
		], $code);
	}
}