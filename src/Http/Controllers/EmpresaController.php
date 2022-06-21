<?php

namespace Juarismi\Base\Http\Controllers;

use Illuminate\Http\Request;
use Juarismi\Base\Models\Negocio\Empresa;

class EmpresaController extends AppController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Empresa::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        return "Opción Inactiva";

        /*$request->validate([
            'nombre' => 'required',
            'stock_negativo' => 'in:si,no'
        ]);

        $_request = $request->only([
            'nombre',
            'ruc',
            'stock_negativo',
            'simbolo_moneda',
            'logo_path'
        ]);


        try {
            $empresa = Empresa::create($_request);    

            return [
                'data' => $empresa,
                'message' => 'Se creo la empresa correctamente'
            ];

        } catch (\Exception $e) {
            $this->serverError($e);
        }*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empresa = Empresa::find($id);
        return $empresa;
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
            'nombre' => 'required',
            'stock_negativo' => 'required|in:si,no',
            'simbolo_moneda' => 'required'  
        ]);

        $_request = $request->only([
            'nombre',
            'ruc',
            'stock_negativo',
            'simbolo_moneda',
            'logo_path'
        ]);

        try {
            $empresa = Empresa::find($id);    
            if ($empresa == NULL)
                throw new \Exception("Empresa no encontrada");
            
            $empresa->update($_request);

            return [
                'data' => $empresa,
                'message' => 'Se actualizo emrpesa correctamente'
            ];

        } catch (\Exception $e) {
            return $e;
            $this->serverError($e);
        }
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
