<?php

namespace Juarismi\Base\Http\Controllers;

use Illuminate\Http\Request;
use Juarismi\Base\Models\Negocio\ProductoTipo;
//use Juarismi\Base\Models\Negocio\Imagen;
//use Juarismi\Base\Http\Resources\Producto\ProductoResource;
//use Juarismi\Base\Http\Resources\ServicioTipo\ServicioTipoResource;
use Illuminate\Support\Str;

class ProductoTipoController extends AppController
{
    public function __construct(){}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Filtros
        $estado = $request->input('estado',1);

        // Order
        $orderType = $request->input('orderBy','asc');
        $orderBy = $request->input('orderType','nombre');

        // Paginacion
        $rows = $request->input('rows', 20);

        $tipoList = ProductoTipo::where('estado', $estado)
            ->orderBy($orderBy, $orderType);

        return $tipoList->paginate($rows);
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
        /*$codigo = sha1(\Carbon\Carbon::now());
        $codigo = strtoupper(substr($codigo, 0, 10));
        $codigo = 'T_SERV-' . $codigo; 

        try {

            // Si tiene una categoria, verificar
            $tipoSuperiorId = $request->input('tipo_superior', NULL);
            $tipoListSuperior = ServicioTipo::where([
                                    'id' => $tipoSuperiorId, 
                                    'estado' => 'activo'
                                ])->first();


            if ($tipoSuperiorId != NULL && !isset($tipoListSuperior)){
                return response([
                    'errors' => [
                        'Tipo de servicio/Tipo de item no esta definido'
                    ]
                ], 500);
            }

        
            $tipoList = new ServicioTipo;
            $tipoList->nombre = urldecode($request->input('nombre', ''));
            $tipoList->descripcion = urldecode($request->input('descrìpcion', ''));
            $tipoList->imagen = $request->input('imagen', 0);
            $tipoList->icono = $request->input('icono', 0);
            $tipoList->codigo = $codigo;
            $tipoList->se_repite = $request->input('se_repite', 'no');
            $tipoList->id_publicador = $request->input('id_publicador', NULL);
            $tipoList->slug = Str::slug($request->input('nombre', ''), '-');
            $tipoList->tipo_superior = $tipoSuperiorId;
            $tipoList->save();
            
            return [ 
                "data" => $tipoList, 
                "message" => "Tipo de servicio creado correctamente"
            ];
        } catch (Exception $e) {
            return response("Server error", 500);
        }

        */

        $_request = $request->only([
            'nombre',
            'codigo',
            'slug',
            'tiposuperior_id',
        ]);


        return $_request;
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        // $tipoList = ServicioTipo::find($id);
        // if (!isset($tipoList)) {
        //     return response([
        //         "data" => NULL,
        //         "message" => "Tipo de Servicio no encontrado"
        //     ], 404);
        // }

        // return new ServicioTipoResource($tipoList);
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
        
        // $tipoSuperiorId = $request->input('tipo_superior', NULL);
        // $tipoList = ServicioTipo::find($id);
        // if (!isset($tipoList)) {
        //     return response([
        //         "data" => NULL,
        //         "message" => "Tipo no encontrado"
        //     ], 404);
        // }

        // $tipoList->nombre = urldecode($request->input('nombre', ''));
        // $tipoList->descripcion = urldecode($request->input('descrìpcion', ''));
        // $tipoList->imagen = 0;
        // $tipoList->icono = 0;
        // $tipoList->se_repite = $request->input(
        //     'se_repite', $tipoList->se_repite
        // );
        // $tipoList->id_publicador = $request->input('id_publicador', NULL);
        // $tipoList->slug = Str::slug($request->input('nombre', ''), '-');
        // $tipoList->tipo_superior = $tipoSuperiorId;
        // $tipoList->save();


        // return [ 
        //     "data" => $tipoList, 
        //     "message" => "Tipo de servicio editado correctamente"
        // ];
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $tipoList = ServicioTipo::find($id);
        // if (!isset($tipoList)){ 
        //     return response([
        //         "data" => NULL,
        //         "message" => "Tipo no encontrado"
        //     ], 404);
        // }

        // $tipoList->estado = 'archivado';
        // $tipoList->save();
        // $tipoList->servicios()->update('estado', 'archivado');

        // return [
        //     "data" => $tipoList,
        //     "message" => "Tipo de Servicio archivado correctamente"
        // ];
    }
}
