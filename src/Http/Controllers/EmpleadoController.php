<?php

namespace Juarismi\Base\Http\Controllers;

use Illuminate\Http\Request;
use Juarismi\Base\Models\Negocio\Empleado;
use Illuminate\Support\Facades\Hash;
use Juarismi\Base\Http\Requests\Empleado\EmpleadoBasicRequest;

class EmpleadoController extends AppController
{


    public function __construct(){
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Filtros
        $estado = $request->input('estado',1);
        $q = strtolower($request->input("q", NULL));

        // Paginations
        $rows = $request->input('rows',20);

        // Order
        $orderBy = $request->input('orderBy', 'updated_at');
        $orderType = $request->input('orderType', 'desc');


        $empleadoList = Empleado::where('estado', $estado);

        if ($q != NULL){
            $empleadoList->where(function($query) use ($q){
                $query->orWhereRaw("LOWER(nombre_apellido) LIKE '%$q%'");
                $query->orWhere([
                    'ci' => $q,
                    'ruc' => $q
                ]);
            }); 
        }

        return $empleadoList->orderBy($orderBy, $orderType)
                ->paginate($rows);
    }


    /**
     * Paga de un salario completo
     * 
     * @link /empleados/{id}/pagar-sueldo
     */
    /*public function pagar_sueldo($id){
        $empleado = Empleado::where('estado', 'activo')
                            ->where('id', $id)
                            ->first();

        if(!isset($empleado)){
            return response([
                'errors' => ['empleado no encontrado o esta inactivo']
            ], 500);
        }

        $salario = new Salario;
        $salatio->monto = $empleado->sueldo;
        $salatio->concepto = 'Salario';
        $salatio->parcial = 'no';
        $salatio->id_empleado = $id;
        $salatio->fecha_vencimiento = $request->input(
            'fecha_vencimiento', now()
        );
        $salario->save();

        return [
            "data" => $salario,
            "message" => "Pago de Salario asignado correctamente"
        ];
    }*/


    /**
     * Realizar un nuevo adelanto
     * 
     * @link /empleados/{id}/adelantar-sueldo
     */
    /*public function adelantar_sueldo(){
        $empleado = Empleado::where('estado', 'activo')
                            ->where('id', $id)
                            ->first();

        if(!isset($empleado)){
            return response([
                'errors' => ['empleado no encontrado o esta inactivo']
            ], 500);
        }

        $salario = new Salario;
        $salatio->monto = $request->input('monto');
        $salatio->concepto = $request->input('concepto', 'Salario');
        $salatio->monto = $request->input('monto');
        $salatio->parcial = 'no';
        $salatio->id_empleado = $id;
        $salatio->fecha = $request->input('fecha', now());
        $salario->save();

        return [
            "data" => $salario,
            "message" => "Pago de Salario asignado correctamente"
        ];
    }*/


    /**
     * Consultar adelantos
     */
    protected function consultar_adelantos(){

    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmpleadoBasicRequest $request)
    {

        $empleado = Empleado::create($request->all());

        // Se genera el usuario, si indica un password
        /*$password = $request->input('password', NULL);
        if ($password != NULL){
            $user = \Juarismi\Base\User::create([
                'name' => urldecode($request->nombre_apellido),
                'email' => urldecode($request->email),
                'password' => Hash::make($request->password),
            ]);

            $empleado->user_id = $user->id;
            $empleado->save();
        }*/


        return [
            "data" => $empleado,
            "message" => "empleado agregado correctamente"
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
        try {
            $empleado = Empleado::with('usuario')->findOrFail($id);

            return $empleado;   
        } catch (\Exception $e) {
            return $this->serverError($e);
        }
    }

  

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmpleadoBasicRequest $request, $id)
    {
        
        try {
            $empleado = Empleado::findOrFail($id);
            $empleado->update($request->all());

            if($empleado == NULL){
                 throw new \Exception('Empleado no encontrado o esta inactivo', 1);
            }


            // Editando el usuario
            /*$password = $request->input('password', NULL);
            if ($password != NULL){
                $user = \Juarismi\Base\User::find($empleado->user_id);
                if ($user == NULL){
                    $user = new \Juarismi\Base\User;
                    $user->name = $empleado->nombre_apellido;
                } 

                $user->password = Hash::make($request->password);
                $user->email = $empleado->email;
                $user->username = $empleado->email;
                $user->save();

                $empleado->user_id = $user->id;
            }

            $empleado->save();*/

            return [
                "data" => $empleado,
                "message" => "Empleado actualizado correctamente"
            ];
        } catch (\Exception $e) {
            return $this->serverError($e);
        }
       
    }


    /**
     * Remove the specified resource from storage   .
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        try {
            $empleado = Empleado::findOrFail($id);
            $empleado->delete();

            return [
                "data" => $empleado,
                "message" => "empleado inactivado correctamente"
            ];
        } catch (\Exception $e) {
            return $this->serverError($e);
        }
        
    }



}
