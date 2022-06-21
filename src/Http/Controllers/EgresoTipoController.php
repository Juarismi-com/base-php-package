<?php

namespace Juarismi\Base\Http\Controllers;

use Illuminate\Http\Request;
use Juarismi\Base\Models\Negocio\EgresoTipo;

/**
 * @api api/v1/egreso-tipo
 */
class EgresoTipoController extends AppController
{
	public function index(){
        return [
            "data" => EgresoTipo::all()
        ];
    }


    /**
     * Guarda un tipo de Egreso
     * 
     */
    public function store(Request $request){
        $eTipo = new EgresoTipo;   
        $eTipo->concepto = $request->input('concepto');
        $eTipo->observacion = $request->input('observacion');
        $eTipo->monto_defecto = $request->input('monto_defecto', 0);
        $eTipo->fecha_desde  = $request->input('fecha_desde');

        $eTipo->save();

        return [
            'data' => $eTipo
        ];
    }


    /**
     * Actualiza un Tipo de Egreso
     * 
     */
    public function update($id, Request $request){
    	$eTipo = EgresoTipo::find($id);

        if (!isset($eTipo)){
            return [
                "message" => "Concepto no encontrado",
                "data" => $eTipo
            ];
        }

        $eTipo->concepto = urldecode($request->concepto);
        $eTipo->observacion = urldecode($request->observacion);
        $eTipo->monto_defecto = urldecode($request->monto_defecto);
        $eTipo->save();

        return [
            "message" => "Concepto guardado correctamente",
            "data" => $eTipo
        ];
    }


    public function destroy($id){
    	$eTipo = EgresoTipo::find($id);

    	if (!isset($eTipo)){
    		return response([
                "message" => "Concepto no encontrado"
            ], 404);
    	}

    	$eTipo->delete();
    	return [
    		"data" => $eTipo,
    		"message" => "Concepto eliminado correctamente"
    	];
    }
}
