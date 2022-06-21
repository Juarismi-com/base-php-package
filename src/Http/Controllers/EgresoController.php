<?php

namespace Juarismi\Base\Http\Controllers;

use Illuminate\Http\Request;
use Juarismi\Base\Models\Negocio\Egreso;


class EgresoController extends AppController
{
	public function index(){
        return [ 'data' => Egreso::all()];
    }

    public function update($id){
        $egreso = Egreso::find($id);
        if ($egreso == NULL){
            return response([
                'message' => 'Error 404'
            ], 404);
        }


        $egreso->observacion = $request->input(
            'observacion', $egreso->observacion
        );
        $egreso->concepto = $request->input('concepto', $egreso->concepto);
        $egreso->monto = $request->input('monto', $egreso->monto);
        $egreso->save();

        return [
            'data' => $egreso,
            'message' => 'Egreso actualizado correctamente'
        ];
    }


    public function store(Request $request){
        $egreso = new Egreso;   
        $egreso->concepto = $request->input('concepto', NULL);
        $egreso->observacion = $request->input('observacion');
        $egreso->monto = $request->input('monto');
        $egreso->fecha  = $request->input('fecha');
        $egreso->id_egresotipo = $request->input('id_egresotipo', NULL);

        $egreso->save();

        return [ 
            'data' => $egreso ,
            'message' => 'Egreso creado correctamente'

        ];
    }


    public function destroy($id){
    	$egreso = Egreso::find($id);
    	if (!isset($egreso)){
    		return response(404)->json();
    	}

    	$egreso->delete();

    	return [
    		"data" => $egreso,
    		"message" => "Egreso Eliminado correctamente"
    	];
    }
}
