<?php

namespace Juarismi\Base\Http\Controllers;

use Illuminate\Http\Request;
use Juarismi\Base\Models\Negocio\VentaDetalle;
use Juarismi\Base\Models\Negocio\Venta;
use Juarismi\Base\Models\Negocio\Servicio;
//use Juarismi\Base\Http\Resources\VentaDetalle\VentaDetalleResource;

class VentaDetalleController extends AppController
{
    public function index(Request $request){
        $vDetalles = VentaDetalle::paginate(20);
        return [
            "data" => $vDetalles
        ];
    }

    /**
     * Se borra un detalle de una venta
     */
    public function destroy($id){
        $ventaDetalle = VentaDetalle::find($id);
        if (!isset($ventaDetalle)){
            return response([
                "errors" => [ "Detalle Incongruente"]
            ], 500);
        }

        $ventaDetalle->delete();

        $this->actualizarTotalVenta($ventaDetalle->venta);
        $this->actualizarStockActual($ventaDetalle->servicio);

        return response([
            "message" => "Detalle eliminado correctamente",
        ]); 
    }


   /**
    * Guarda una detalle de una venta
    * - Verifica que la venta exista
    * - Verifica que el servicio
    */
   public function store(Request $request){
        try {
            $request->validate([
                'id_venta' => 'required',
                'id_servicio' => 'required'
            ]);        

            $ventaId = $request->input('id_venta', NULL);
            $servicioId = $request->input('id_servicio', NULL);
            $venta = Venta::find($ventaId);
            $servicio = Servicio::find($servicioId);

            if (!isset($venta) || !isset($servicio)){
                throw new Exception("Error Processing Request", 1);
            }       

            $ventaDetalle = new VentaDetalle;
            $ventaDetalle->id_servicio = $servicio->id;
            $ventaDetalle->id_venta = $venta->id;
            $ventaDetalle->cantidad = 1;
            $ventaDetalle->precio = $servicio->precio_venta;
            $ventaDetalle->precio_defecto = $servicio->precio_venta;
            $ventaDetalle->precio_x_cantidad = $servicio->precio_venta;
            $ventaDetalle->concepto = $servicio->titulo;
            $ventaDetalle->save();

            $this->actualizarTotalVenta($venta);
            $this->actualizarStockActual($ventaDetalle->servicio);

            return response([
                "message" => "Detalle agregado correctamente",
                "data" => $ventaDetalle
            ]);     

        } catch (Exception $e) {
            return response([
                "errors" => [ $e->getMessage() ]
            ], 500);
        }
        
   }

   /**
    * Actuali la cantidad del stock actual en base a los detallesg 
    * generados
    * 
    * @param \Juarismi\Base\Models\Negocio\Servicio $servicio 
    */
    protected function actualizarStockActual($servicio){
        $cantidadVendida = $servicio->ventaDetalle
                            ->where('cantidad', '!=', NULL)
                            ->sum('cantidad');
        $servicio->stock_actual -= $cantidadVendida;
        $servicio->save();
    }

   /**
    * Actualiza el detalle de una venta
    * 
    * @method PUT
    * @link venta-detalle/{id}
    * 
    * @param $id - Id del Detalle de la venta
    */
   public function update(Request $request, $id){

        $request->validate([
            'cantidad' => 'required|integer|min:1|max:10000',
            'precio' => 'required|integer'
        ]);        


        $ventaDetalle = VentaDetalle::find($id);
        if (!isset($ventaDetalle)){
            return response([
                "errors" => [
                    "message" => "Detalle o venta no encontradas"
                ]
            ], 500);
        }

        $cantidad = $request->input('cantidad' , 1);
        $precio = $request->input('precio', 0);
        $impuesto = $request->input('tipo_iva', 0.10);
        $precioxCantidad = $cantidad * $precio;


        $ventaDetalle->precio = $precio;
        $ventaDetalle->cantidad = $cantidad;
        $ventaDetalle->observacion = '--';
        $ventaDetalle->tipo_iva = $impuesto;
        $ventaDetalle->precio_x_cantidad = $precioxCantidad;
        $ventaDetalle->save();

        $this->actualizarTotalVenta($ventaDetalle->venta);       
        $this->actualizarStockActual($ventaDetalle->servicio);

        return response([
            "message" => "Se actualizo la venta",
            "data" => $ventaDetalle
        ]);         
   }

   /**
    * @param Juarismi\Base\Models\Negocio\venta $venta
    */
    protected function actualizarTotalVenta($venta){
        $venta->monto_total = $venta->ventaDetalle->sum(
            'precio_x_cantidad'
        );
        $venta->save();
    }


   /**
    * Elimina todas las ventas pasdas en un arreglo
    */
   public function eliminarVarios(Request $request){
        // Verifica existencia de la venta
        $ventaId = $request->input('id_venta');
        $venta = Venta::find($ventaId);

        if (!isset($venta)){
            return response([
                "errors" => [
                    "message" => "Venta no esta disponible"
                ]
            ], 500);
        }

        // Arrays de ID's a ser eliminados
        $idsParaEliminar = $request->input('reg', NULL);
        if ($idsParaEliminar == NULL){
            return response([
                "errors" => [
                    "message" => "Detalle Incongruente"
                ]
            ], 404);
        }

        try {
            $ventaDetalles = VentaDetalle::whereIn('id', $idsParaEliminar)
                                ->where('id_venta' , $ventaId )
                                ->delete();
            
            return [
                "message" =>  "Detalles eliminado correctamente"
            ];

        } catch (Exception $e) {
            return $e->getMessage();
        }
   }


    public function show($id){
        $vDetalle = VentaDetalle::find($id);

        if (!isset($vDetalle)){
            return response([
                'errors' => [
                    'message' => 'Detalle no encontrado',
                ]
            ]);
        }

        //return new VentaDetalleResource($vDetalle);
        return ["data" => $venta ];
    }


}
