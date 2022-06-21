<?php

namespace Juarismi\Base\Http\Controllers;

use Illuminate\Http\Request;
use Juarismi\Base\Models\Negocio\Proveedor;
use Juarismi\Base\Http\Requests\Proveedor\ProveedorBasicRequest;
//use Juarismi\Base\Http\Resources\Proveedor\ProveedorBasicResource;

class ProveedorController extends AppController
{

    protected $proveedor_fields = [
        'nombre',
        'codigo',
        'telefono',
        'telefono2',
        'nro_documento',
        'direccion',
        'email',
        'tipo_proveedor',
        'limite_cta_cte',
        'fecha_ingreso'
    ];

    /**
     * Listado de proveedores
     * Filtros por parametros ?estado=, termino = '?q=', 
     * 
     * Posibilidad de Ordenar por cualquier campo
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

        $proveedorList = Proveedor::where('estado', $estado);

        if ($q != NULL){
            $proveedorList->where(function($query) use ($q, $estado)
            {   
                $query->orWhereRaw("LOWER(nombre) LIKE '%$q%'");
                $query->orWhere([
                    'nro_documento' => $q,
                    'codigo' => $q
                ]);
            });
        }

        return $proveedorList->orderBy($orderBy, $orderType)
                ->paginate($rows);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProveedorBasicRequest $request)
    {
        
        try {
            $input = $request->only($this->proveedor_fields);
            $proveedor = Proveedor::create($input);

            return [
                'data' => $proveedor, 
                'message' => 'Proveedor agregado correctamente'
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
        try {
            $proveedor = Proveedor::findOrFail($id);
            return $proveedor;
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
    public function update(ProveedorBasicRequest $request, $id)
    {
        try {
            $input = $request->only($this->proveedor_fields);

            $proveedor = Proveedor::findOrFail($id);
            $proveedor->update($input);

            return [
                'data' => $proveedor , 
                'message' => 'Proveedor editado correctamente'
            ];

        } catch (Exception $e) {
            return $this->serverError($e);
        }

    }


  
    /**
     * Se elimina el proveedor de la base de datos
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $proveedor = Proveedor::findOrFail($id);
            $proveedor->delete();

            return [
                'data' => $proveedor,
                'message' => 'Proveedor eliminado correctamente'
            ]; 
        } catch (Exception $e) {
            return $this->serverError($e);
        }
    }
}
