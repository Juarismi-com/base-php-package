<?php

namespace Juarismi\Base\Http\Controllers\Contabilidad;

use Juarismi\Base\Http\Controllers\AppController;
use Illuminate\Http\Request;
use Juarismi\Base\Models\Contabilidad\Movimiento;
use Juarismi\Base\Models\Contabilidad\AperturaCierreCaja;
use Juarismi\Base\Models\Contabilidad\MovimientoTipo;
use Illuminate\Support\Facades\DB;

class MovimientoController extends AppController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // pagination
        $rows = $request->input('rows', 20);

        return \Juarismi\Base\Http\Resources\Movimiento\MovimientoResource::collection(
            Movimiento::orderBy('id', 'desc')->paginate($rows)
        );
    }

    /**
     * 1. Verifica si el movimientipo existe
     * 2. Busca el ultimo movimiento
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'movimientotipo_id' => 'required',
            'monto_movimiento' =>  'required',
            'caja_id' => 'required'
        ]);

        $_request  =$request->only([
            'cliente_id',
            'proveedor_id',
            'empleado_id',
            'sucursal_id',
            'caja_id',
            'creador_id',
            'fecha_creacion',
            'movimientotipo_id',
            'tipo_cuenta',
            'observacion',
            'monto_movimiento'
        ]);

        $_request['fecha_creacion'] = now();
        $movimientotipo_id = $request->movimientotipo_id;
        $monto_movimiento = $request->monto_movimiento;

        try {
            DB::beginTransaction();

            $movimientoTipo = MovimientoTipo::find($movimientotipo_id);
            if ($movimientoTipo == NULL)
                throw new \Exception("Tipo de Movimiento no existe");

            $ult_movimiento = Movimiento::latest()->first();
            $ult_saldo = !isset($ult_movimiento->saldo_movimiento) ? 0 : 
                    $ult_movimiento->saldo_movimiento;

            // En caso que no sea un ingreso
            if ($movimientoTipo->tipo_cuenta != 1) {
                if ($ult_movimiento == NULL)
                    throw new \Exception("No existe ultimo movimiento");

                if ($ult_saldo < $monto_movimiento)
                    throw new \Exception("Saldo es inferior a la transacción");
                
                $ult_saldo = $ult_saldo - $monto_movimiento;

            } else {
                $ult_saldo = $monto_movimiento + $ult_saldo;
            }

            $_request['saldo_movimiento'] = $ult_saldo;
            $movimiento = Movimiento::create($_request);

            // Abre o cierra la caja si corresponde al tipo de movimiento
            $e = $this->abrir_cerrar_caja($movimiento);    
            if ($e instanceof \Exception ) {
                throw $e;
            }
            DB::commit();

            return [
                'data' => $movimiento,
                'message' => 'Movimiento Agregado correctamente'
            ];

        } catch (\Exception $e) {
            DB::rollBack();
            return $this->serverError($e);
        }
    }



    /**
     * Si el movimiento es una apertura o cierre (Lo genera en la DB)
     * TipoId: 18 = Apertura
     * TipoId : 19 = Cierre
     * En cualquier otro caso, la caja siempre debe estar abierta != NULL
     */
    protected function abrir_cerrar_caja(Movimiento $movimiento){
        try {
            $tipoId = $movimiento->movimientotipo_id;

            $caja_abierta = AperturaCierreCaja::where('estado', 'abierto')
                ->where('caja_id', $movimiento->caja_id)
                ->latest()
                ->first();

            if ($tipoId == 19){
                if ($caja_abierta == NULL){
                    throw  new \Exception("Caja no se encuentra abierta");
                } 

                $caja_abierta->estado = 'cerrado';
                $caja_abierta->monto_cierre = $movimiento->saldo_movimiento;
                $caja_abierta->save();

            } else if ($tipoId == 18) {
                if ($caja_abierta != NULL){
                    throw new \Exception("Caja se encuentra abierta");
                } 
                
                AperturaCierreCaja::create([
                    'monto_apertura' => $movimiento->monto_movimiento,
                    'estado' => 'abierto',
                    'fecha_apertura' => now(),
                    'caja_id' => $movimiento->caja_id
                ]);
            } else {
                if ($caja_abierta == NULL)
                    throw  new \Exception("Caja no se encuentra abierta");
            }

        } catch (\Exception $e) {
            return $e;
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
