<?php

namespace Juarismi\Base\Http\Controllers;

use Illuminate\Http\Request;
use Juarismi\Base\Models\Negocio\Funcionario;
use Juarismi\Base\Models\Negocio\Cliente;
use Juarismi\Base\Http\Requests\Cliente\ClienteBasicRequest;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Juarismi\Base\Http\Resources\Cliente\ClienteResource;
use Juarismi\Base\Http\Resources\Cliente\ClienteBasicResource;
use Juarismi\Base\Http\Controllers\AppController;

class ClienteController extends AppController
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
        $estado =  $request->input('estado', 1);
        $q = strtolower($request->input("q", NULL));

        // Orden
        $orderBy = $request->input('orderBy', 'updated_at');
        $orderType = $request->input('orderType', 'desc');

        // Paginacion
        $rows = $request->input('rows', 20);

        $clienteList = Cliente::where('estado', $estado);

        if ($q != NULL){
            $clienteList->where(function($query) use ($q)
            {   
                $query->orWhereRaw("LOWER(nombre) LIKE '%$q%'");
                $query->orWhere([
                    'ruc' => $q,
                    'ci' => $q
                ]);
            });
        }

        return ClienteBasicResource::collection($clienteList->paginate($rows));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClienteBasicRequest $request)
    {
        try {
            $cliente = Cliente::create($request->all());

            return [
                "data" => $cliente,
                "message" => "Cliente agregado correctamente",
            ];

        } catch (\Exception $e) {
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
        $cliente = Cliente::findOrFail($id);    

        return $cliente;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClienteBasicRequest $request, $id)
    {

        try {
            $cliente = Cliente::findOrFail($id);    
            $cliente->update($request->all());

            return [
                'data' => $cliente,
                'message' => 'Cliente editado correctamente'
            ];

        } catch (\Exception $e) {
            return $this->serverError($e);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {   
        try {
            $cliente->delete();

            return [
                "data" => $cliente,
                "message" => "Cliente eliminado correctamente"
            ];
        } catch (Exception $e) {
           return  $this->serverError($e);
        }
        
    }


    /**
     * Retorna todos los contratoServicio de un cliente
     * 
     * @link /api/clientes/{id}/contrato-servicio
     * 
     * @param Cliente $id
     * 
     */
    // public function contrato_servicio_por_cliente($id){

    //     $cliente = Cliente::find($id);
    //     if (!isset($cliente)){
    //         return response([
    //             'errors' => [ 'Cliente no encontrado' ]
    //         ], 404);
    //     }

    //     return ContratoServicioResource::collection($cliente->contratos);
    // }

}
