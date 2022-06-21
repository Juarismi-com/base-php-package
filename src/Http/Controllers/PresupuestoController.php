<?php

namespace Juarismi\Base\Http\Controllers;

use Illuminate\Http\Request;
use Juarismi\Base\Models\Negocio\Presupuesto;
use Juarismi\Base\Models\TallerMecanico\OrdenCompraDetalle;
use Illuminate\Support\Facades\DB;
use Juarismi\Base\Http\Requests\Presupuesto\PresupuestoRequest;
use Juarismi\Base\Models\Negocio\PresupuestoDetalle;
use Juarismi\Base\Http\Resources\Presupuesto\PresupuestoBasicResource;
use Juarismi\Base\Http\Resources\Presupuesto\PresupuestoResource;

class PresupuestoController extends AppController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Filtro
        $fechaDesde = $request->input('fecha_desde', NULL);
        $fechaHasta = $request->input('fecha_hasta', NULL);

        // Order
        $orderBy = $request->input('orderBy', 'fecha');
        $orderType = $request->input('orderType', 'asc');

        // Pagination
        $rows = $request->input('rows', 20);

        $presupuestoList = Presupuesto::with('presupuestoDetalle', 'cliente');

        if ($fechaDesde != NULL &&  $fechaHasta != NULL){
            $fechaDesde =  date_to_DateString($fechaDesde);
            $fechaHasta =  date_to_DateString($fechaHasta);

            $presupuestoList = $presupuestoList->whereBetween('fecha', [
                $fechaDesde, $fechaHasta
            ]);
        }

        $presupuestoList = $presupuestoList->orderBy($orderBy, $orderType)
            ->paginate($rows);

        return PresupuestoBasicResource::collection($presupuestoList);
    }


    /**
     * Inserta el Presupuesto
     * - Inserta los detalles de l presupuesto
     * - Inserta detalles de la orden de compra
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PresupuestoRequest $request)
    {
        $_request = $request->only([
            'nro_comprobante',
            'serie_comprobante',
            'fecha',
            'condicion_presupuesto',
            'monto_total',
            'impuesto_total',
            'ot_id',
            'vendedor_id',
            'cliente_id',
            'sucursal_id',
            'razonsocial_id',
            'tipo_presupuesto',
            'comprobantetipo_id',
            'observacion',
            'estado'
        ]);

        try {
            DB::beginTransaction();
            
            $presupuesto = Presupuesto::create($_request);
            $presupuesto_detalle = collect($request->presupuesto_detalle);

            $presupuesto_detalle->each(function($detalle) use ($presupuesto) {

                $cantidad = isset($detalle['cantidad']) ?
                            $detalle['cantidad'] : 1;

                $p_detalle_row = PresupuestoDetalle::create([
                    'producto_id' => $detalle['producto_id'],
                    'precio_vta' => $detalle['precio_vta'],
                    'presupuesto_id' => $presupuesto->id,
                    'cantidad' => $cantidad,
                    'precio_x_cantidad' => $cantidad * $detalle['precio_vta']
                ]);

                // Si existe compra detalle relacionada
                if (isset($detalle['oc_detalle'])){
                    $this->with_orden_compra(
                        $p_detalle_row, $detalle['oc_detalle']
                    );    
                }
            });
            
            $presupuesto->monto_total = $presupuesto->presupuestoDetalle
                ->sum('precio_x_cantidad');
            $presupuesto->save();

            DB::commit();

            return [
                'message' => "Se genero la presupuesto correctamente",
                'data' => new PresupuestoResource($presupuesto)
            ];
        } catch (\Exception $e) {
            DB::rollBack();
            return response($e);
        }
    }

    /**
     * Agrega orden de compra al presupuesto
     * 
     * @param Presupuesto $presupuesto
     * @param Request $request
     */
    protected function with_orden_compra($p_detalle_row, $oc_detalle){

        $oc_detalle = collect($oc_detalle);
        $oc_detalle->each(function($detalle) use ($p_detalle_row, $oc_detalle) {

            $cantidad = isset($detalle['cantidad']) ?
                        $detalle['cantidad'] : 1;

            OrdenCompraDetalle::create([
                'producto_id' => $detalle['producto_id'],
                'cantidad' => $cantidad,
                'precio_compra' => $detalle['precio_compra'],
                'presupuestodetalle_id' => $p_detalle_row->id,
                'proveedor_id' => $detalle['proveedor_id'],
                'selected' => $detalle['selected'],
                'presupuesto_id' => $p_detalle_row->presupuesto_id,
                'precio_x_cantidad' => $cantidad * $detalle['precio_compra']
            ]);
        });
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $presupuesto = Presupuesto::find($id);

        if (!isset($presupuesto)){
            return response(["data" => NULL ], 404);
        } 

        return new PresupuestoResource($presupuesto);
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
        try {
            DB::beginTransaction();
            $presupuesto = Presupuesto::find($id);

            if (!isset($presupuesto))
                throw new \Exception("Presupuesto no existe");
                
            if ($presupuesto->venta_id != NULL)
                throw new \Exception("Presupuesto ya fue asignado");

            DB::commit();

        } catch (\Exception $e) {
            DB::rollBack();
            return $this->serverError($e);
        }
       
    }
}
