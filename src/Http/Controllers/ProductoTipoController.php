<?php

namespace Juarismi\Base\Http\Controllers;

use Illuminate\Http\Request;
use Juarismi\Base\Models\Negocio\ProductoTipo;
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

		$pTipoList = ProductoTipo::where('estado', $estado)
				->orderBy($orderBy, $orderType);

		return $pTipoList->paginate($rows);
	}

	/**
	 * Crea una nueva categoria
	 *   - Verifica si la misma se encuentra en una activa
	 * 
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request){
		$request->validate([
				'nombre' => 'required|min:10|max:255',
		]);

		try {
				$input = $request->all();
				$parentId = $request->input('parent_id', NULL);
				
				// En el caso que la categoria padre este definida
				if ($parentId){
					$parentCategory = ProductoTipo::where([
							'id' => $parentId, 
							'estado' => 1
					])->first();
					
					if ($parentCategory == NULL)
							throw new \Exception("Categoria padre no existe", 500);
				}
				
				$input['slug'] = Str::slug($input['nombre'], '-') . '_' . uniqid();
				$pTipo = ProductoTipo::create($input);

				return [ 
					"data" => $pTipo, 
					"message" => "Tipo de servicio creado correctamente"
				];
		} catch(\Exception $e) {
				return [$e];
				return response([
					"data" => NULL,
					"message" => $e->getMessage()
				], $e->getCode());
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
		$pTipo = ProductoTipo::findOrFail($id);
		return $pTipo;
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
		try {
			$parentId = $request->input('parent_id', NULL);
			$nombre = $request->input('nombre', NULL);
			$input = $request->all();
			$pTipo = ProductoTipo::findOrFail($id);
      
			// En el caso que la categoria padre este definida
    if ($parentId){
        $parentCategory = ProductoTipo::where([
            'id' => $parentId, 
            'estado' => 1
        ])->first();
        
        if ($parentCategory == NULL)
          throw new \Exception("Categoria padre no existe", 500);
      }
      
      // Si se recibe un nuevo nombre, se genera un nuevo slug
      if ($nombre){
        $input['slug'] = Str::slug($nombre, '-') . '_' . uniqid();
      }
      
      $pTipo->update($input);

      return [ 
        "data" => $pTipo, 
        "message" => "Tipo de servicio creado correctamente"
      ];
    } catch(\Exception $e) {
      return response([
        "data" => NULL,
        "message" => $e->getMessage()
      ], 500);
    }
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @todo
	 * Validar si tiene productos relacionados, no eliminar la categoria
	 * 
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		$pTipo = ProductoTipo::findOrFail($id);

    if ($pTipo->id != 1)
        throw new \Exception("No puede editarse la categoria", 500);

		$pTipo->delete();
		return [
				"data" => $pTipo,
				"message" => "Tipo de Servicio eliminado correctamente"
		];
	}
}
