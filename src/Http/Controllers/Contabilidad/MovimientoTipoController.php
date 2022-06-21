<?php

namespace Juarismi\Base\Http\Controllers\Contabilidad;

use Juarismi\Base\Http\Controllers\AppController;
use Illuminate\Http\Request;
use App\Models\Contabilidad\MovimientoTipo;

class MovimientoTipoController extends AppController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Filtros
        $tipo_cuenta = $request->input('tipo_cuenta', NULL);
        $estado =  $request->input('estado', 'activo');

        $movTipoList = MovimientoTipo::where('estado', $estado);

        if ($tipo_cuenta != NULL){
            $tipo_cuenta = explode(',', $tipo_cuenta);
            $movTipoList->whereIn('tipo_cuenta', $tipo_cuenta);
        }

        return $movTipoList->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
