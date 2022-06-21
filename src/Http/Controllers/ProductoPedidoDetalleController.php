<?php

namespace Juarismi\Base\Http\Controllers;

use Illuminate\Http\Request;
use Juarismi\Base\Models\Negocio\ProductoPedidoDetalle;
use Juarismi\Base\Http\Resources\Pedido\ProductoPedidoDetalleResource;

class ProductoPedidoDetalleController extends AppController
{

    public function __construct(){
        $this->middleware('cors');
    }


    public function index(){
        $pedidoDetalleList =  ProductoPedidoDetalle::paginate();
        
        return [
            "data" => $pedidoDetalleList
        ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pedidoDetalleData = [
            "cantidad" => $request->cantidad,
            "descripcion" => $request->descripcion,
            "id_producto" => $request->id_producto,
            "id_pedido" => $request->id_pedido,
            "precio_unitario" => $request->precio_unitario,
            "precio_total" => $request->precio_total,
            "disponible" => "si"
        ];

        $pedidoDetalle = ProductoPedidoDetalle::create($pedidoDetalleData);
        return new ProductoPedidoDetalleResource($pedidoDetalle);   
    }




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ProductoPedidoDetalle $pedido_detalle)
    {
        return new ProductoPedidoDetalleResource($pedido_detalle);
    }




    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(
        Request $request, $id
    ){

        $pedidoDetalle = ProductoPedidoDetalle::find($id);
        if (!isset($pedidoDetalle)){
            return response([
                "data" => NULL, 
                "message" => "Item del pedido no encontrado"
            ], 404);
        }

        $disponible = $request->disponible == "no" ? "no" : "si";
        $descripcion = isset($request->descripcion)  ? $request->descripcion : "-" ;

        $data = [
            "cantidad" => $request->cantidad,
            "descripcion" => $descripcion,
            "precio_unitario" => $request->precio_unitario,
            "precio_total" => $request->precio_total,
            "disponible" => $disponible
        ];

        $pedidoDetalle->update($data);
        return [
            "data" => new ProductoPedidoDetalleResource($pedidoDetalle)
        ];   
    }

    /**
     * Hace que un pedido no este disponible
     */
    public function destroy(ProductoPedidoDetalle $id)
    {
        /*$pedidoDetalle = ProductoPedidoDetalle::find($id);
        if (!isset($pedidoDetalle)){
            return response([
                "data" => NULL, 
                "message" => "Item del pedido no encontrado"
            ], 404);
        }
        
        $pedidoDetalle->delete();

        return [
            "data" => $pedidoDetalle,
            "message" => "Item de Pedido Eliminado correctamente"
        ];*/
    }
}
