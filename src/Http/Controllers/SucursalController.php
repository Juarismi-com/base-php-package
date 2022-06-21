<?php

namespace Juarismi\Base\Http\Controllers;

use Illuminate\Http\Request;
use Juarismi\Base\Models\Negocio\Sucursal;

class SucursalController extends AppController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $rows = $request->input('rows', 20);

        return Sucursal::paginate($rows);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_sucursal' => 'required',
            'numero_sucursal' => 'required'
        ]);

        $_request = $request->only([
            'nombre_sucursal',
            'direccion',
            'telefono',
            'telefono2',
            'email',
            'numero_sucursal',
            'factura_timbrado',
            'emision_timbrado',
            'vto_timbrado',
            'ciudad_id',
            'empresa_id',
            'responsable_id',
            'ultimo_comprobante',
            'serie_comprobante',
            'estado',
        ]);


        try {
            $sucursal = Sucursal::create($_request);    

            return [
                'data' => $sucursal,
                'message' => 'Se creo sucursal correctamente'
            ];

        } catch (\Exception $e) {

            return $e;
            //$this->serverError($e);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre_sucursal' => 'required',
            'numero_sucursal' => 'required'
        ]);
        
        $_request = $request->only([
            'nombre_sucursal',
            'direccion',
            'telefono',
            'telefono2',
            'email',
            'numero_sucursal',
            'factura_timbrado',
            'emision_timbrado',
            'vto_timbrado',
            'ciudad_id',
            'empresa_id',
            'responsable_id',
            'ultimo_comprobante',
            'serie_comprobante',
            'estado',
        ]);

        try {
            $sucursal = Sucursal::find($id);    
            if ($sucursal == NULL)
                throw new \Exception("Sucursal no encontrada");
            
            $sucursal->update($_request);

            return [
                'data' => $sucursal,
                'message' => 'Se actualizo sucursal correctamente'
            ];

        } catch (\Exception $e) {
            return $e;
            $this->serverError($e);
        }
    }


    /**
     * @method GET
     * @link sucursales/{id}/comprobantes
     */
    public function get_comprobante_list(){
        
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
