<?php

namespace Juarismi\Base\Http\Controllers;

use Illuminate\Http\Request;
use Juarismi\Base\Models\Negocio\ServicioTipo;
use Juarismi\Base\Models\Negocio\Imagen;
use Juarismi\Base\Http\Resources\Producto\ProductoResource;
use Juarismi\Base\Http\Resources\ServicioTipo\ServicioTipoResource;
use Illuminate\Support\Str;

class ServicioTipoController extends AppController
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
        // Filtros
        $estado = $request->input('estado','activo');
        $seRepite = $request->input('se_repite', NULL);

        // Order
        $orderType = $request->input('order_type','asc');
        $orderBy = $request->input('order_by','nombre');

        // Paginacion
        $rows = $request->input('rows', 20);
        $page = $request->input('page', 1);

        $servTipo = ServicioTipo::where('estado', $estado)
            ->orderBy($orderBy, $orderType);

        if($seRepite != NULL)
            $servTipo->where('se_repite', $seRepite);

        return $servTipo->paginate($rows);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Valores por defecto
        $codigo = sha1(\Carbon\Carbon::now());
        $codigo = strtoupper(substr($codigo, 0, 10));
        $codigo = 'T_SERV-' . $codigo; 

        try {

            // Si tiene una categoria, verificar
            $tipoSuperiorId = $request->input('tipo_superior', NULL);
            $servTipoSuperior = ServicioTipo::where([
                                    'id' => $tipoSuperiorId, 
                                    'estado' => 'activo'
                                ])->first();


            if ($tipoSuperiorId != NULL && !isset($servTipoSuperior)){
                return response([
                    'errors' => [
                        'Tipo de servicio/Tipo de item no esta definido'
                    ]
                ], 500);
            }

        
            $servTipo = new ServicioTipo;
            $servTipo->nombre = urldecode($request->input('nombre', ''));
            $servTipo->descripcion = urldecode($request->input('descrìpcion', ''));
            $servTipo->imagen = $request->input('imagen', 0);
            $servTipo->icono = $request->input('icono', 0);
            $servTipo->codigo = $codigo;
            $servTipo->se_repite = $request->input('se_repite', 'no');
            $servTipo->id_publicador = $request->input('id_publicador', NULL);
            $servTipo->slug = Str::slug($request->input('nombre', ''), '-');
            $servTipo->tipo_superior = $tipoSuperiorId;
            $servTipo->save();
            
            return [ 
                "data" => $servTipo, 
                "message" => "Tipo de servicio creado correctamente"
            ];
        } catch (Exception $e) {
            return response("Server error", 500);
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
        $servTipo = ServicioTipo::find($id);
        if (!isset($servTipo)) {
            return response([
                "data" => NULL,
                "message" => "Tipo de Servicio no encontrado"
            ], 404);
        }

        return new ServicioTipoResource($servTipo);
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
        
        $tipoSuperiorId = $request->input('tipo_superior', NULL);
        $servTipo = ServicioTipo::find($id);
        if (!isset($servTipo)) {
            return response([
                "data" => NULL,
                "message" => "Tipo no encontrado"
            ], 404);
        }

        $servTipo->nombre = urldecode($request->input('nombre', ''));
        $servTipo->descripcion = urldecode($request->input('descrìpcion', ''));
        $servTipo->imagen = 0;
        $servTipo->icono = 0;
        $servTipo->se_repite = $request->input(
            'se_repite', $servTipo->se_repite
        );
        $servTipo->id_publicador = $request->input('id_publicador', NULL);
        $servTipo->slug = Str::slug($request->input('nombre', ''), '-');
        $servTipo->tipo_superior = $tipoSuperiorId;
        $servTipo->save();


        return [ 
            "data" => $servTipo, 
            "message" => "Tipo de servicio editado correctamente"
        ];
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $servTipo = ServicioTipo::find($id);
        if (!isset($servTipo)){ 
            return response([
                "data" => NULL,
                "message" => "Tipo no encontrado"
            ], 404);
        }

        $servTipo->estado = 'archivado';
        $servTipo->save();
        $servTipo->servicios()->update('estado', 'archivado');

        return [
            "data" => $servTipo,
            "message" => "Tipo de Servicio archivado correctamente"
        ];
    }
}
