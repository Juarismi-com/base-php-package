<?php

namespace Juarismi\Base\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Juarismi\Base\Models\Negocio\Compra;
use Juarismi\Base\Models\Negocio\Proveedor;
use Juarismi\Base\Models\Negocio\CompraDetalle;
use Juarismi\Base\Http\Resources\Compra\CompraResource;
use Juarismi\Base\Http\Resources\Compra\CompraBasicResource;
use Juarismi\Base\Http\Requests\Compra\CompraRequest;
use Juarismi\Base\Models\Negocio\Producto;

class CompraController extends AppController
{

    /**
     * Información de compra
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
        $orderBy = $request->input('orderBy', 'fecha_compra');
        $orderType = $request->input('orderType', 'desc');

        // Pagination
        $rows = $request->input('rows', 20);
        $compraList = Compra::with([
          'proveedor',
          'compraDetalle',
          'compraDetalle.producto',
          'sucursal',
          'formaPago'
        ]);

        if ($q != NULL){
          $compraList->whereHas('proveedor', function($query) use ($q){
            $query->where('nombre', 'like', '%' . $q . '%')
              ->orWhere('nro_documento', $q);
          });
        }

        if ($fechaDesde != NULL &&  $fechaHasta != NULL){
          $fechaDesde =  date_to_DateString($fechaDesde);
          $fechaHasta =  date_to_DateString($fechaHasta);

          $compraList = $compraList->whereBetween('fecha_compra', [
            $fechaDesde, $fechaHasta
          ]);
        }
        

        $compraList = $compraList->orderBy($orderBy, $orderType)
          ->paginate($rows);

        //return CompraBasicResource::collection($compraList);       
        return $compraList;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompraRequest $request)
    {
        $input = $request->all();
        
        try {
          DB::beginTransaction();

          $compra = Compra::create($input);
          
          // De de la compra
          $compra_detalle = collect($request->compra_detalle);
          $compra_detalle->each(function($detalle) use ($compra) {
            $cantidad = isset($detalle['cantidad']) ?
                        $detalle['cantidad'] : 1;

            $producto = Producto::findOrFail($detalle['producto_id']);

            CompraDetalle::create([
              'producto_id' => $detalle['producto_id'],
              'precio' => $detalle['precio'],
              'precio_defecto' => $producto->precio_compra,
              'compra_id' => $compra->id,
              'cantidad' => $cantidad,
              'precio_x_cantidad' => $cantidad * $detalle['precio']
            ]);
          });
      
          $compra->monto_total = $compra->compraDetalle
              ->sum('precio_x_cantidad');

          DB::commit();

          return [
            'message' => "Se genero la compra correctamente",
            'data' => $compra
          ];   
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->serverError($e);
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
        $compra = Compra::with([
          'proveedor',
          'compraDetalle',
          'compraDetalle.producto',
          'sucursal',
          'formaPago'
        ])->findOrFail($id);

        return $compra;
    }

  

    /**
     * Verifica si existe el proveedor y suma, 
     * todos los detalles de la compra
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }


    /**
     * Confirma que se realizo una compra
     */
    public function confirmar(Request $request, $id){
        
    }

    /**
     * Elimina una compra y todos sus detalles
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $compra = Compra::find($id);
        //$concretado  = $request->input('concretado', 'si');    

        if (!isset($compra)) {
            return response([
                'message' => 'Compra no encontrada',
                'data' => NULL,
            ], 404);
        }

        $compra->compraDetalle()->delete();
        $compra->delete();

        return [
            'message' => 'Compra eliminada correctamente',
            'data' => $compra,
        ];
    }

}
