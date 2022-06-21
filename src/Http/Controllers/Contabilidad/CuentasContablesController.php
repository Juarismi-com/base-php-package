<?php

namespace App\Http\Controllers\API\Contabilidad;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Contabilidad\CuentaContable;


class CuentasContablesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $nivel = $request->input('nivel', 'grupo_basico');
        $codigo = $request->input('codigo', NULL);

        $cuentas = CuentaContable::where('nivel', $nivel)
                    ->get();

        return $cuentas;
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
            'codigo_nivel_superior' => 'required',
            'nivel' => 'required',
            'nombre' => 'required|min:6',
            'required' => 'required'
        ]);

        $cuentaSuperiorId = $request->input('cuenta_superior_id');
        $nivel = $request->nivel;
        $codigoNivel = $request->codigo_nivel;

        try {
          /*  $cuenta = CuentaContable::where([
                'nivel'=> $nivel,
                'codigo_nivel' => $codigoNivel
            );

            switch ($nivel) {
                case 'grupo_financiero':
                    
                    break;
                case 'cuenta_control':
                    $nivelAInsertar = 'cuenta_detalle';
                    break;
                case 'cuenta_detalle':
                    $nivelAInsertar = 'cuenta_movimiento';
                    break;
                    
                default:
                    throw new Exception(
                        "Grupo de cuenta contable no encontrado", 1
                    );
                    break;

            if ($cuenta == NULL){
                throw new Exception("Cuenta Superior no definida", 1);
            }


            $newCuenta = new CuentaContable;
            $newCuenta->observacion = $request->input('observacion', NULL);
            $newCuenta->nombre = $request->nombre;
            $newCuenta->nivel = 
            $newCuenta->cod_grupo_basico = $cuenta->cod_grupo_basico;
            $newCuenta->cod_cuenta_control = $cuenta->cod_cuenta_control;
            $newCuenta->cod_cuenta_detalle = $cuenta->cod_cuenta_detalle;
            $newCuenta->cod_cuenta_movimiento = $cuenta->cod_cuenta_detalle;
            $newCuenta->save();*/

            
            /**
             * 1. Se asigna un nivel correspondiente que de la cuenta, indica
             * que tan indentada estara la cuenta 
             * 
             * @example 
             * https://avilesnieves.com/blog/plan-de-cuentas-contable-excel/
             * 
             * 2. Ademas se asigna el numero autoincrementado correspondiente 
             * para el codigo, del nivel correspondiente, se busca el ultimo 
             * numero 
             */



        } catch (Exception $e) {
            return response([
                'errors' => [$e->getMessage()]
            ], 500);
        }

    }

    /**
     * Display the specified resource.
     *
     * 
     * @link /api/v1/cuentas/{id}
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        try {
            $cuenta = CuentaContable::find($id);

            switch ($cuenta->nivel) {
                case 'grupo_basico':
                    return $cuenta->where('nivel', 'grupo_financiero')
                        ->all();            
                    break;
                case 'grupo_financiero':
                    return $cuenta->where('nivel', 'cuenta_control')
                        ->all();                   
                    break;
                case 'cuenta_control':
                    return $cuenta->where('nivel', 'cuenta_detalle')
                        ->all();                   
                    break;
                case 'cuenta_detalle':
                    return $cuenta->where('nivel', 'cuenta_movimiento')
                        ->all();                   
                    break;
                    
                default:
                    throw new Exception("Grupo de cuenta contable no encontrado", 1);
                    break;
            };


        } catch (Exception $e) {
            return response([
                'errors' => ['message' => $e->getMessage() ]
            ], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
