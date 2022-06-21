<?php

namespace Juarismi\Base\Http\Controllers;

use Illuminate\Http\Request;
use Juarismi\Base\Models\Negocio\Funcionario;
use Juarismi\Base\Models\Negocio\Cliente;
use Juarismi\Base\Http\Requests\Cliente\ClienteBasicRequest;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Juarismi\Base\Http\Resources\Cliente\ClienteResource;
use Juarismi\Base\Http\Resources\Cliente\ClienteBasicResource;
//use Juarismi\Base\Http\Resources\Cobranza\ClienteCobranzaResource;
// use Juarismi\Base\Http\Resources\Contrato\ContratoServicioResource;

class PersonaController extends AppController
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
        $estado =  $request->input('estado', 'activo');
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
            $cliente = new Cliente;

            $cliente->nombre = urldecode($request->nombre);
            $cliente->telefono = urldecode($request->input('telefono', NULL));
            $cliente->telefono2 = urldecode($request->input('telefono2', NULL));
            $cliente->ci = $request->input('ci', NULL);
            $cliente->ruc = $request->input('ruc', NULL);
            $cliente->email = urldecode($request->input('email', NULL));
            $cliente->direccion = urldecode($request->input('direccion', NULL));
            $cliente->genero = $request->input('genero', NULL);
            $cliente->fecha_ingreso = date_to_DateString(
                $request->input('fecha_ingreso', NULL)
            );
            $cliente->fecha_nacimiento = date_to_DateString(
                $request->input('fecha_nacimiento', NULL)
            );
            $cliente->tipo_cliente = urldecode(
                $request->input('tipo_cliente', 'P')
            );
            $cliente->limite_cta_cte = urldecode($request->input('limite_cta_cte', 0));
            $cliente->saldo = urldecode($request->input('saldo', 0));
            $cliente->ciudad_id = $request->input('ciudad_id', NULL);
            $cliente->ubicacion_geo = es_geoubicacion(
                $request->input('ubicacion_geo', NULL)
            ); 
            $cliente->estado = "activo";
            $cliente->save();

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

            $nombre = urldecode($request->input('nombre', NULL)); 
            $telefono = urldecode($request->input('telefono', NULL)); 
            $telefono2 = urldecode($request->input('telefono2', NULL)); 
            $codigo = urldecode($request->input('codigo', NULL)); 
            $ci = urldecode($request->input('ci', NULL)); 
            $ruc = urldecode($request->input('ruc', NULL)); 
            $estado = $request->input('estado', NULL); 
            $email = $request->input('email', NULL); 
            $direccion = urldecode($request->input('direccion', NULL)); 
            $ubicacion_geo = es_geoubicacion(
                $request->input('ubicacion_geo', NULL)
            ); 
            $genero = $request->input('genero', NULL); 
            $fecha_ingreso = date_to_DateString(
                $request->input('fecha_ingreso', NULL)
            ); 
            $fecha_nacimiento = date_to_DateString(
                $request->input('fecha_nacimiento', NULL)
            ); 
            $tipo_cliente = $request->input('tipo_cliente', NULL); 
            $limite_cta_cte = $request->input('limite_cta_cte', NULL); 
            $saldo = $request->input('saldo', NULL); 
            $cargo_id = $request->input('cargo_id', NULL); 
            $user_id = $request->input('user_id', NULL); 
            $ciudad_id = $request->input('ciudad_id', NULL); 

            if ($nombre != NULL)
                $cliente->nombre = $nombre;

            if ($telefono != NULL)
                $cliente->telefono = $telefono;

            if ($telefono2 != NULL)
                $cliente->telefono2 = $telefono2;

            if ($codigo != NULL)
                $cliente->codigo = $codigo;

            if ($ci != NULL)
                $cliente->ci = $ci;

            if ($ruc != NULL)
                $cliente->ruc = $ruc;

            if ($estado != NULL)
                $cliente->estado = $estado;

            if ($email != NULL)
                $cliente->email = $email;

            if ($direccion != NULL)
                $cliente->direccion = $direccion;

            if ($ubicacion_geo != NULL)
                $cliente->ubicacion_geo = $ubicacion_geo;

            if ($genero != NULL)
                $cliente->genero = $genero;

            if ($fecha_ingreso != NULL)
                $cliente->fecha_ingreso = $fecha_ingreso;

            if ($fecha_nacimiento != NULL)
                $cliente->fecha_nacimiento = $fecha_nacimiento;

            if ($tipo_cliente != NULL)
                $cliente->tipo_cliente = $tipo_cliente;

            if ($limite_cta_cte != NULL)
                $cliente->limite_cta_cte = $limite_cta_cte;

            if ($saldo != NULL)
                $cliente->saldo = $saldo;

            if ($cargo_id != NULL)
                $cliente->cargo_id = $cargo_id;

            if ($user_id != NULL)
                $cliente->user_id = $user_id;

            if ($ciudad_id != NULL)
                $cliente->ciudad_id = $ciudad_id;

            $cliente->save();

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
       
    }

}
