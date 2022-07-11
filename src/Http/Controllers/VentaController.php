<?php

namespace Juarismi\Base\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Juarismi\Base\Models\Negocio\Venta;
use Juarismi\Base\Models\Negocio\VentaDetalle;
use Juarismi\Base\Models\Negocio\Cliente;
use Juarismi\Base\Http\Resources\Venta\VentaBasicResource;
use Juarismi\Base\Http\Resources\Venta\VentaResource;
use Juarismi\Base\Http\Requests\Venta\VentaRequest;
use Juarismi\Base\Models\Negocio\ComprobantePorSucursal;
use Juarismi\Base\Http\Controllers\AppController;
use Juarismi\Base\Models\Negocio\Producto;
use Juarismi\Base\Traits\TComprobanteTipo;

class VentaController extends AppController
{
    use TComprobanteTipo;

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
        $q = $request->input('q', NULL);

        // Order
        $orderBy = $request->input('orderBy', 'fecha_venta');
        $orderType = $request->input('orderType', 'desc');

        // Pagination
        $rows = $request->input('rows', 20);

        $ventaList = Venta::with([
          'cliente', 
          'ventaDetalle', 
          'ventaDetalle.producto',
          'sucursal',
          'formaPago'
        ]);

        if ($q != NULL){
            $ventaList->whereHas('cliente', function($query) use ($q){
              $query->where('nombre', 'like', '%' . $q . '%')
                ->orWhere('ci', $q)
                ->orWhere('ruc', $q);
            });
        }
        
        if ($fechaDesde != NULL && $fechaHasta != NULL){
            $fechaDesde = date_to_DateString($fechaDesde);
            $fechaHasta = date_to_DateString($fechaHasta);

            $ventaList = $ventaList->whereBetween('fecha_venta', [
                $fechaDesde, $fechaHasta
            ]);
        }

        $ventaList = $ventaList->orderBy($orderBy, $orderType)
                        ->paginate($rows);

        return $ventaList;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VentaRequest $request)
    {
        $input = $request->all();
        $comprobanteTipoId = $request->input('comprobantetipo_id',3); //Ticket
        $sucursalId = $request->input('sucursal_id',1);

        
        try {
          DB::beginTransaction();
          
          $comprobante = $this->getLastComprobanteEmitido(
            $comprobanteTipoId, $sucursalId
          );
          $input['nro_comprobante'] = $comprobante->ultimo_nro;
          
          // Si el tipo de comprobante es una factura, agrega la serie a la venta
          if ($comprobanteTipoId == 1){
            $input['serie_factura'] = $comprobante->serie_comprobante;
          }

          $venta = Venta::create($input);

          // Se el detalle de la venta
          $venta_detalle = collect($request->venta_detalle);
          $venta_detalle->each(function($detalle) use ($venta, $request) {
              $cantidad = isset($detalle['cantidad']) ?
                          $detalle['cantidad'] : 1;

              $producto = Producto::findOrFail($detalle['producto_id']);

              VentaDetalle::create([
                'producto_id' => $detalle['producto_id'],
                'precio' => $detalle['precio'],
                'precio_defecto' => $producto->precio_vta,
                'venta_id' => $venta->id,
                'cantidad' => $cantidad,
                'precio_x_cantidad' => $cantidad * $detalle['precio'],
                'atendedor_id' => $request->input('atendedor_id', NULL)
              ]);
          });
          
          $venta->monto_total = $venta->ventaDetalle->sum('precio_x_cantidad');
          $venta->save();

          // Si la venta es a credito, se ggenera el mismo
          if ($request->condicion_venta == 'credito'){
              $this->generar_venta_credito($request, $venta);
          }

          DB::commit();

          return [
            'message' => "Se genero la venta correctamente",
            'data' => $venta
          ];
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->serverError($e);
        }
    }


    /**
     * Genera credito, y lo asociacion a una venta
     */
    protected function generar_venta_credito(Request $request, $venta){
      // Generar x cantidad de cuotas con fecha de vencimiento + 1 mes, dos, tyres y asi sucesivamente
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Venta::with([
          'cliente', 
          'ventaDetalle', 
          'ventaDetalle.producto',
          'sucursal',
          'formaPago'
        ])->findOrFail($id);
    }

  

    /**
     * Verifica si existe el Cliente y suma, 
     * todos los detalles de la venta
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'comprobantetipo_id' => 'required'
        ]);

        
        $serieFactura = $request->input('serie_factura', NULL);
        

        try {
            DB::beginTransaction();

            $venta = Venta::where('nro_factura', NULL)
                ->where('id', $id)
                ->first();

            if ($venta == NULL)
                throw new \Exception("Venta no existente o el comprobante ya fue emitido", 1);
            
            // Obtenemos el ultimo nro de factura 
            
            $venta->nro_documento = $comprobante->ultimo_nro;
            $venta->save(); 

            DB::commit();

        } catch (\Exception $e) {
            DB::rollBack();
            return $e;
            return $this->serverError($e);
        }




        // $concretado = $request->input('concretado', 'si');
        // $venta = Venta::where('concretado', 'no')->find($id);
        // if (!isset($venta)) 
        //     return response([ 'errors' => [
        //         'venta no encontrada o ya se encuentra ',
        //     ]], 500);

        // // Verifica existencia del Cliente
        // $clienteId = $request->input('id_cliente');
        // $cliente = Cliente::find($clienteId);
        // if(!isset($cliente)){
        //     return response([
        //         'message' => 'Cliente no encontrado'
        //     ], 500);
        // }

        // $venta->id_cliente = $cliente->id;

        // // Verifica el formato de la fecha
        // $fecha = $request->input('fecha_venta', NULL);
        // if ($fecha != NULL){
        //     $venta->fecha_venta = \Carbon\Carbon::createFromFormat(
        //         'd/m/Y', urldecode($fecha)
        //     )->toDateString();
        // }        

        // $venta->concretado = $concretado;
        // $venta->condicion_venta = $request->input(
        //     'condicion_venta', 'contado'
        // );
        // $venta->observacion = urldecode($request->input('observacion',NULL));
        // $venta->monto_total = $venta->ventaDetalle->sum('precio_x_cantidad');
        
        // $venta->save();

        // return [
        //     'message' => "Se actualizo la venta correctamente",
        //     'data' => $venta
        // ];
    }


    /**
     * Confirma que se realizo una venta
     */
    // public function confirmar(Request $request, $id){
        
    // }

    /**
     * Elimina una venta y todos sus detalles
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $venta = venta::find($id);

        if (!isset($venta)) {
            return response([
                'message' => 'venta no encontrada',
                'data' => NULL,
            ], 404);
        }

        $venta->ventaDetalle()->delete();
        $venta->delete();

        return [
            'message' => 'Venta eliminada correctamente',
            'data' => $venta,
        ];
    }

}
