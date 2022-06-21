<?php

namespace Juarismi\Base\Http\Controllers;

use Illuminate\Http\Request;
use Juarismi\Base\Models\Negocio\Servicio;
use Juarismi\Base\Models\Negocio\ServicioTipo;
use Juarismi\Base\Http\Resources\Servicio\ServicioResource;
use Juarismi\Base\Models\Negocio\Imagen;

class ServicioController extends AppController
{
    public function __construct(){
        $this->middleware('cors');
    }

    /**
     * Display a listing of the resource.
     *
     * @method GET
     * @link servicios
     * 
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Filtros
        $q = $request->input('q', NULL);
        $estado = $request->input('estado', 'activo');
        $mensual = $request->input('mensual', 'no');
        $servTipo = $request->input('tipo_servicio', NULL);
        $seRepite = $request->input('se_repite', NULL);

        // Order
        $orderType = $request->input('order_type','asc');
        $orderBy = $request->input('order_by','nombre');

        // Paginations
        $rows = $request->input('rows', 20);
        $page = $request->input('page', 1);

        $servList = Servicio::where('estado', $estado);

        // Verifica que servicios se repite (es decir pueden ser mensuales, etc)
        if ($seRepite != NULL){
            $tipoServicioIDs = ServicioTipo::select('id')
                ->where('se_repite', $seRepite)
                ->where('estado', $estado)
                ->get();

            $servList->whereIn('tipo_servicio', $tipoServicioIDs);
        } elseif ($servTipo != NULL)  {
            $servList->whereIn('tipo_servicio', $servTipo);
        }

        
        if ($q != NULL){
            $q = urldecode(strtolower($q));
            
            $servList->where('titulo', 'LIKE', "%".$q."%")
                ->orWhere(function($query) use ($q, $estado){
                    $query->orWhere([
                        'codigo_interno' => $q, 
                        'codigo_externo' => $q,
                        'codigo_barras' => $q,
                        'marca' => $q,
                    ])->where('estado', $estado);
                });
        }
        
        return ServicioResource::collection(
            $servList->paginate($rows)
        );
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'tipo_servicio' => 'required',
            'precio_venta' => 'required',
            'precio_compra' => 'required',
            'stock_minimo' => 'required'
        ]);

        // Verfica el tipo de servicio
        $servTipoId = $request->input('tipo_servicio', NULL);
        $servTipo = ServicioTipo::find($servTipoId);

        if (!isset($servTipo)){
            return response([
                'errors' => [
                    'Tipo de servicio/Tipo de item no esta definido'
                ]
            ], 500);
        }


        // Verificar Imagen
        $imagenId = $request->input('imagen_portada', 0);
        $imagen = Imagen::find($imagenId);

        if(!isset($imagen)){
            return response([
                'errors' => [
                    'Imagen no disponible'
                ]
            ], 500);
        }

        $codigo = sha1(\Carbon\Carbon::now());
        $codigo = strtoupper(substr($codigo, 0, 10));
        $codigo = 'SERV-' . $codigo; 

        $serv = new Servicio;
        $serv->titulo = urldecode($request->input('titulo', NULL));
        $serv->estado = $request->input('estado', 'activo');
        $serv->codigo_interno = $codigo;
        $serv->tipo_servicio = $servTipoId;
        $serv->descripcion = urldecode($request->input('descripcion', ''));
        $serv->imagen_portada = $imagenId;
        $serv->precio_venta = $request->input('precio_venta', NULL);
        $serv->precio_venta_especial = $request->input(
                                     'precio_venta_especial', NULL
                                 );
        $serv->precio_compra = $request->input('precio_compra', NULL);
        $serv->precio_compra_especial = $request->input(
                                     'precio_compra_especial', NULL
                                 );

        $serv->id_publicador = $request->input('id_publicador', NULL);
        $serv->moneda = $request->input('moneda', 1);
        $serv->stock_minimo = $request->input('stock_minimo', 1);
        $serv->save();
      
        return [
            "data" => $serv,
            "message" => "Servicio/Item agregado correctamente"
        ];
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $serv = Servicio::find($id);

        if (!isset($serv)) 
            return response([
                "data" => null, 
                "message" => "Servicio no encontrado"
            ], 404);

        return new ServicioResource($serv);
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
        $request->validate([
            'tipo_servicio' => 'required',
            'precio_venta' => 'required',
            'precio_compra' => 'required',
            'stock_minimo' => 'required'
        ]);
        
        // Verfica el tipo de servicio y el servicio
        $servTipoId = $request->input('tipo_servicio', NULL);
        $servTipo = ServicioTipo::find($servTipoId);
        $serv = Servicio::find($id);

        if (!isset($servTipo) || !isset($serv)){
            return response([
                'errors' => [
                    'Tipo o servicio no esta definido'
                ]
            ], 500);
        }

        // Verificar Imagen
        $imagenId = $request->input('imagen_portada', 0);
        $imagen = Imagen::find($imagenId);

        if(!isset($imagen)){
            return response([
                'errors' => [
                    'Imagen no disponible'
                ]
            ], 500);
        }

        $serv->titulo = urldecode($request->input('titulo', NULL));
        $serv->estado = $request->input('estado', 'activo');
        $serv->tipo_servicio = $servTipoId;
        $serv->descripcion = urldecode($request->input('descripcion', ''));
        $serv->precio_venta = $request->input('precio_venta', NULL);
        $serv->precio_venta_especial = $request->input(
                                    'precio_venta_especial', NULL
                                );
        $serv->precio_compra = $request->input('precio_compra', NULL);
        $serv->precio_compra_especial = $request->input(
                                    'precio_compra_especial', NULL
                                );

        $serv->id_publicador = $request->input('id_publicador', NULL);
        $serv->marca = $request->input('marca', NULL);
        $serv->codigo_barras = $request->input('codigo_barras', NULL);
        $serv->stock_minimo = $request->input('stock_minimo');
        $serv->save();
      
        return [
            "data" => $serv,
            "message" => "Servicio/Item editado correctamente"
        ];
    }


    /**
     * Re establece el estado de la facturación
     */
    public function restaurar($id){
        $serv = Servicio::find($id);

        if (!isset($servicio)){
            return response([
                'Servicio no encontrado'
            ], 404);
        }

        $serv->estado = 'activo';
        $serv->save();

        return [
            'message' => 'Servicio Restaurado correctamente',
            'data' => $serv
        ];
    }

    /*
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $serv = Servicio::find($id);

        if (!isset($serv)){
            return [
                "data" => NULL,
                "message" => "Servicio no encontrado"
            ];
        }

        $serv->estado = 'archivado';
        $serv->save();

        return [
            "data" => $serv,
            "message" => "Servicio eliminado correctamente",
            "type_message" => "success"
        ];
    }


    // Elimina la imagen portada del producto
    public function removerImagenPortada(Servicio $producto){
        $producto->imagen_portada = 0;

        return [
            "data" => $producto,
            "message" => "Imagen del producto eliminada correctamente"
        ]; 
    }

}
