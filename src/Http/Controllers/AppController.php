<?php

namespace Juarismi\Base\Http\Controllers;

use App\Http\Controllers\Controller;

class AppController extends Controller
{
	protected function serverError(\Exception $e){
    $code = 500;
		return response([ 
			'message' => 500,
			'code' => $code,
			'raw' => $e
		], $code);
	}
}