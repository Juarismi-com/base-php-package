<?php

namespace Juarismi\Base\Http\Controllers;

use Illuminate\Http\Request;
use Juarismi\Base\Models\Negocio\ComprobantePorSucursal;


class ComprobantePorSucursalController extends AppController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Filtros
        $estado =  $request->input('estado', 'activo');
        $q = strtolower($request->input("q", NULL));
        $sucursal_id = $request->input("sucursal_id", NULL);
        $comprobantetipo_id = $request->input("comprobantetipo_id", NULL);

        // Orden
        $orderBy = $request->input('orderBy', 'updated_at');
        $orderType = $request->input('orderType', 'desc');

        // Paginacion
        $rows = $request->input('rows', 20);
        
        $comprobanteList = ComprobantePorSucursal::with([
            'sucursal', 'comprobante_tipo'
        ]);

        // Filtra documentos por Sucursal
        if ($comprobantetipo_id != NULL & $sucursal_id != NULL){
            $comprobanteList->where([
                'comprobantetipo_id' =>  $comprobantetipo_id,
                'sucursal_id' => $sucursal_id
            ]);
        }   
        
        if ($q != NULL){
            $comprobanteList->whereHas('comprobante_tipo', function($query) 
                use ($q) {
                    $query->where('nombre', 'like', '%' . $q . '%')
                        ->orWhere('id', $q);
                });
        }

        return $comprobanteList->paginate($rows);
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
            'sucursal_id' => 'required',
            'comprobantetipo_id' => 'required',
            'serie_comprobante' => 'required',
            'ultimo_nro' => 'required|integer',
        ]);

        $_request = $request->only([
            'sucursal_id',
            'comprobantetipo_id',
            'serie_comprobante',
            'ultimo_nro',
        ]);

        $comprobante = ComprobantePorSucursal::create($_request);
        return $comprobante;
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        //
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

