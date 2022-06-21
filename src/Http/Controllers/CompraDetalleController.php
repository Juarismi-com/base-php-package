<?php

namespace Juarismi\Base\Http\Controllers;

use Illuminate\Http\Request;
use Juarismi\Base\Models\Negocio\CompraDetalle;
use Juarismi\Base\Models\Negocio\Compra;
use Juarismi\Base\Models\Negocio\Servicio;
use Juarismi\Base\Http\Resources\CompraDetalle\CompraDetalleResource;

class CompraDetalleController extends AppController
{
	public function index(Request $request){
		$cDetalles = CompraDetalle::paginate(20);
		return [
			"data" => $cDetalles
		];
	}

	/**
	 * Se borra un detalle de una compra
	 */
	public function destroy($id){
		$compraDetalle = CompraDetalle::find($id);
      	if (!isset($compraDetalle)){
        	return response([
            	"errors" => [
               		"message" => "Detalle Incongruente"
            	]
        	], 500);
      	}

		$compraDetalle->delete();

        $this->actualizarTotalCompra($compraDetalle->compra);
        $this->actualizarStockActual($compraDetalle->servicio);

		return response([
   			"message" => "Detalle eliminado correctamente",
   			"data" => new CompraDetalleResource($compraDetalle)
   		]);	
	}

    /**
    * Listado de todos los servicios comprados en una determinada fecha
    */
    public function agruparServicios(){

    }


   /**
    * Guarda una detalle de una compra
    * - Verifica que la compra exista
    * - Verifica que el servicio
    */
   public function store(Request $request){

        $request->validate([
            'id_compra' => 'required',
            'id_servicio' => 'required'
        ]);        

		$compraId = $request->input('id_compra', NULL);
		$servicioId = $request->input('id_servicio', NULL);
      	$compra = Compra::find($compraId);
      	$servicio = Servicio::find($servicioId);

		if (!isset($compra) || !isset($servicio)){
			return response([
            	"errors" => [ "Servicio o Compra no estan inicializados"]
			], 500);
		}      	

		$compraDetalle = new CompraDetalle;
		$compraDetalle->id_servicio = $servicio->id;
		$compraDetalle->id_compra = $compra->id;
        $compraDetalle->cantidad = 1;
		$compraDetalle->precio = $servicio->precio_compra;
        $compraDetalle->precio_defecto = $servicio->precio_compra;
		$compraDetalle->precio_x_cantidad = $servicio->precio_compra;
		$compraDetalle->concepto = $servicio->titulo;
        $compraDetalle->precio_dolar = $servicio->precio_dolar;
		$compraDetalle->save();

        $this->actualizarTotalCompra($compra);
        $this->actualizarStockActual($servicio);

		return response([
			"message" => "Detalle agregado correctamente",
			"data" => $compraDetalle
		]);	
   }

   /**
    * Actuali la cantidad del stock actual en base a los detallesg 
    * generados
    * 
    * @param \Juarismi\Base\Models\Negocio\Servicio $servicio 
    */
    protected function actualizarStockActual($servicio){
        $servicio->stock_actual = $servicio->compraDetalle
                                ->where('cantidad', '!=', NULL)
                                ->sum('cantidad');

        $servicio->save();
    }

   /**
    * Actualiza el detalle de una compra
    * 
    * @method PUT
    * @link compra-detalle/{id}
    * 
    * @param $id - Id del Detalle de la compra
    */
   public function update(Request $request, $id){

        $request->validate([
            'cantidad' => 'required|integer|min:1|max:10000',
            'precio' => 'required|integer'
        ]);        


      	$compraDetalle = CompraDetalle::find($id);
      	if (!isset($compraDetalle)){
        	return response([
            	"errors" => [
               		"message" => "Detalle o compra no encontradas"
            	]
        	], 500);
      	}

      	$cantidad = $request->input('cantidad' , 1);
        $precio = $request->input('precio', 0);
        $impuesto = $request->input('tipo_iva', 0.10);
        $precioxCantidad = $cantidad * $precio;


		$compraDetalle->precio = $precio;
        $compraDetalle->cantidad = $cantidad;
		$compraDetalle->observacion = '--';
      	$compraDetalle->tipo_iva = $impuesto;
        $compraDetalle->precio_x_cantidad = $precioxCantidad;
		$compraDetalle->save();

        $this->actualizarTotalCompra($compraDetalle->compra);       
        $this->actualizarStockActual($compraDetalle->servicio);

		return response([
			"message" => "Se actualizo la compra",
			"data" => $compraDetalle
		]);	   		
   }

   /**
    * @param Juarismi\Base\Models\Negocio\Compra $compra
    */
    protected function actualizarTotalCompra($compra){
        $compra->monto_total = $compra->compraDetalle->sum(
            'precio_x_cantidad'
        );
        $compra->save();
    }


   /**
    * Elimina todas las compras pasdas en un arreglo
    */
   public function eliminarVarios(Request $request){
        // Verifica existencia de la compra
        $compraId = $request->input('id_compra');
        $compra = Compra::find($compraId);

        if (!isset($compra)){
            return response([
                "errors" => [
                    "message" => "Compra no esta disponible"
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
      		$compraDetalle = CompraDetalle::whereIn('id', $idsParaEliminar)
                ->where('id_compra' , $compraId );
      		$compraDetalle->delete();
            
      		return [
      			"message" =>  "Detalles eliminado correctamente"
      		];

      	} catch (Exception $e) {
      		return $e->getMessage();
      	}
   }


    public function show($id){
        $cDetalle = CompraDetalle::find($id);

        if (!isset($cDetalle)){
            return response([
                'errors' => [
                    'message' => 'Detalle no encontrado',
                ]
            ]);
        }

        return new CompraDetalleResource($cDetalle);
    }


}
