<?php

namespace Juarismi\Base\Http\Controllers;

use Illuminate\Http\Request;
use Juarismi\Base\Models\Common\ProductoPedido;
use Juarismi\Base\Http\Resources\Pedido\ProductoPedidoResource;
use Juarismi\Base\Models\Common\ProductoPedidoDetalle;

class ProductoPedidoController extends AppController
{

    public function __construct(){
        $this->middleware('cors');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $ordernarPor = trim($request->ordernarPor);
        $tipoDeOrden = trim($request->tipoDeOrden); //asc / desc
        $id_cliente = $request->id_cliente;
        $fecha_solicitud = $request->fecha_solicitud;
        $uuid = $request->uuid;
        $fecha_entrega = $request->fecha_entrega;
        $hora_entrega = $request->hora_entrega;
        $estado = $request->estado;


        if((isset($ordernarPor) && !empty($ordernarPor))
             && (isset($tipoDeOrden) && !empty($tipoDeOrden)))
            $pedidoList = ProductoPedido::orderBy($ordernarPor,$tipoDeOrden);
        else 
            $pedidoList = ProductoPedido::orderBy("updated_at", "desc");

        if (isset($id_cliente) && is_numeric($id_cliente))
            $pedidoList->where('id_cliente', $id_cliente);

        if (isset($fecha_solicitud) && !empty($fecha_solicitud))
            $pedidoList->where('fecha_solicitud', $fecha_solicitud);

        if (isset($uuid) && !empty($uuid))
            $pedidoList->where('uuid', $uuid);
        
        if (isset($fecha_entrega) && !empty($fecha_entrega))
            $pedidoList->where('fecha_entrega', $fecha_entrega);

        if (isset($fecha_entrega) && !empty($fecha_entrega))
            $pedidoList->where('hora_entrega', $hora_entrega);

        if (isset($estado) && !empty($estado))
            $pedidoList->where('estado', $estado);
        else 
            $pedidoList->where('estado', '!=', 'archivado');

        return $pedidoList->paginate();
    }


    public function show(ProductoPedido $pedido){
        return new ProductoPedidoResource($pedido);
    }


    /**
     * Crea un nuevo pedido
     */
    public function store(Request $request){
        
        $imagenId = isset($request->imagen) ? $request->imagen : 0 ;
        $clienteId = isset($request->id_cliente) ? $request->id_cliente : 0 ;

        $pedidoData = [      
            "id_cliente" => $request->id_cliente,
            "estado" => "no_entregado",
            "uuid" => uniqid("pedido_", true),
            "fecha_solicitud" => $request->fecha_solicitud,
            "nro_pedido" => $request->nro_pedido,
            "condicion_venta" => $request->condicion_venta,
            "fecha_entrega" => $request->fecha_entrega,
            "id_funcionario" => $request->id_funcionario,
            "hora_entrega" => $request->hora_entrega,
            "imagen" => $request->imagen,
            "descripcion" => urldecode($request->imagen)
        ];    
        
        $pedido = ProductoPedido::create($pedidoData);

        return [
            "data" => $pedido,
            "message" => "Pedido creado correctamente"
        ];
    }


    /**
     * Guarda un pedido con informacion del cliente y el listado de 
     * Items de Productos 
     */
    public function storeFull(Request $request){

        $imagenId = isset($request->imagen) ? $request->imagen : 0 ;
        $clienteId = isset($request->id_cliente) ? $request->id_cliente : 0 ;

        $pedidoItemList = $request->productos;
        $pedidoData = [      
            "id_cliente" => $request->id_cliente,
            "estado" => "no_entregado",
            "uuid" => uniqid("pedido_", true),
            "fecha_solicitud" => $request->fecha_solicitud,
            "nro_pedido" => $request->nro_pedido,
            "condicion_venta" => $request->condicion_venta,
            "fecha_entrega" => $request->fecha_entrega,
            "id_funcionario" => $request->id_funcionario,
            "hora_entrega" => $request->hora_entrega,
            "imagen" => $request->imagen,
            "descripcion" => urldecode($request->imagen)
        ];    
        
        $pedido = ProductoPedido::create($pedidoData);
        
        foreach ($pedidoItemList as $key => $item) {
            $item["id_pedido"] = $pedido->id;
            $productoList[$key] = $item;
        }

        ProductoPedidoDetalle::insert($productoList);
        return new ProductoPedidoResource($pedido);
    }

    /**
     * @ignore
     */
    protected function verificarPedido($request){
        $data = [      
            "id_cliente" => 0,
            "estado" => "no_entregado",
            "fecha_solicitud" => date("Y-m-d"),
            "nro_pedido" => NULL,
            "condicion_venta" => "contado",
            "fecha_entrega" => date("Y-m-d"),
            "id_funcionario" => NULL,
            "hora_entrega" => NULL,
            "imagen" => $request->imagen,
            "descripcion" => urldecode($request->imagen)
        ];
    }


    /**
     * Actualiza la informaicon de un pedido
     * 
     */
    public function update(Request $request, $id){
        $pedido = ProductoPedido::find($id);

        if (!isset($pedido)){
            return [
                "data" => NULL,
                "message" => "Pedido no fue encontrado"
            ];            
        }

        $imagenId = isset($request->imagen) ? $request->imagen : 0 ;
        $clienteId = isset($request->id_cliente) ? $request->id_cliente : 0 ;

        $pedidoData = [      
            "id_cliente" => $clienteId,
            "estado" => $request->estado,
            "fecha_solicitud" => $request->fecha_solicitud,
            "nro_pedido" => $request->nro_pedido,
            "condicion_venta" => $request->condicion_venta,
            "fecha_entrega" => $request->fecha_entrega,
            "id_funcionario" => $request->id_funcionario,
            "hora_entrega" => $request->hora_entrega,
            "imagen" => $imagenId,
            "descripcion" => urldecode($request->descripcion)
        ];    
        
        $pedido->update($pedidoData);

        return [
            "data" => new ProductoPedidoResource($pedido),
            "message" => "Pedido editado correctamente"
        ];
    }


    /**
     * Archiva un pedido
     */
    public function archivar(ProductoPedido $pedido){
        $pedido->estado = "archivado";
        $pedido->save();

        return [
            "message" => "Pedido archivado correctamente",
            "data" => $pedido
        ];
    }



    /**
     * @ignore
     */
    public function destroy(ProductoPedido $pedido){

    }
}
