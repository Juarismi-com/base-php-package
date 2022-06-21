<?php

namespace Juarismi\Base\Http\Controllers;

use Illuminate\Http\Request;
use Juarismi\Base\Models\Contabilidad\AperturaCierreCaja;
use Juarismi\Base\Models\Contabilidad\Movimiento;

class CierreCajaController extends AppController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $caja_id = $request->input('caja_id', NULL);
        $cajero_id = $request->input('cajero_id', NULL);
        $rows = $request->input('rows', 20);

        $ape_cierre = new AperturaCierreCaja;

        if ($caja_id != NULL)
            $ape_cierre->where('caja_id', $caja_id);

        if ($cajero_id != NULL)
            $ape_cierre->where('cajero_id', $cajero_id);

        $ape_cierre = $ape_cierre->pagination($rows);

        return $ape_cierre;
    }

    /**
     * Para el caso de cerrar una caja la misma debe estar activa y existir,
     * De momento cualquier usuario puede cerrar cualquier caja
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $caja_id = $request->input('caja_id', $request->id);

        $ult_movimiento = Movimiento::
        $ult_saldo = !isset($ult_movimiento->saldo_movimiento) ? 0 : 
                    $ult_movimiento->saldo_movimiento;

        $movimiento = Movimiento::where('estado', 'abierto')
            ->where('caja_id', $caja_id)
            ->Wlatest()->first();

        $ape_cierre = AperturaCierreCaja::where([
            'caja_id' => $caja_id,
            'cajero_id' => Auth::id()
        ]);
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
