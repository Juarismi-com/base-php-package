<?php

namespace Juarismi\Base\Http\Controllers;

use Illuminate\Http\Request;
use Juarismi\Base\Models\Negocio\Salario;
use Juarismi\Base\Models\Negocio\AdelantoSalario;

class SalarioController extends AppController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'id_funcionario' => 'required',
            'monto' => 'required',
            'fecha_pago' => 'required'
        ]);
        $funcionarioId = $request->id_funcionario;

        // Crea un nuevo salario con los parametros definidos
        $adelanto = new Salario;
        
        $adelanto->monto = $request->input('monto');
        $adelanto->concepto = urldecode(
            $request->input('concepto', 'Pago de salario'), 
        );
        $adelanto->fecha_pago = urldecode(
            $request->input(
                'fecha_pago', 
                \Carbon\Carbon::now()->copy()->toDateString()
            )
        );
        $adelanto->id_funcionario = $funcionarioId;
        $adelanto->save();

        // Actualizar adelanto pendiente
        $adelanto = AdelantoSalario::where('id_funcionario', $funcionarioId)
                        ->where('debitado', 'no')
                        ->first();
        
        if ($adelanto != NULL){
            $adelanto->debitado = 'si';
            $adelanto->save();    
        }

        return [
            "data" => $adelanto,
            "message" => "Salario vinculado correctamente"
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
        //
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
