<?php

namespace Juarismi\Base\Http\Controllers;

use Illuminate\Http\Request;
use Juarismi\Base\Models\Negocio\Producto;
use Juarismi\Base\Http\Resources\Producto\ProductoResource;
use Juarismi\Base\Http\Requests\Producto\ProductoRequest;

class ProductoController extends AppController
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
        // Filtro
        $q = $request->input("q", NULL);

        // Paginacion
        $rows = $request->input('rows', 20);

        if ($q != NULL){
            $q = urldecode(strtolower($q));

            $query = Producto::where('nombre', 'LIKE', "%".$q."%")
                ->orWhere(function($query) use ($q){
                    $query->orWhere([
                        'codigo' => $q, 
                        'codigo_barras' => $q,
                        'id' => $q,
                        'codigo_externo' => $q
                    ]);
                });

            $productoList = $query->orderBy('nombre', 'asc')
                ->paginate($rows);
            $productoList->appends(['q' => $q])->links();

        } else {
            $productoList = Producto::orderBy('nombre', 'asc')
                ->paginate($rows);
        }
        
        return $productoList;
    }

    /**
     * @link /productos/
     */
    public function get_por_codigo_barras($codigo_barras){
        $codigo_barras = trim($codigo_barras);

        try {
            $producto = Producto::where('codigo_barras', $codigo_barras)
                ->first();    

            if ($producto == NULL)
                throw new \Exception("Producto no esta disponible");
                
            return $producto;
        } catch (\Exception $e) {
            return $this->serverError($e);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductoRequest $request)
    {
        $producto = Producto::create($request->all());
        return [
            'data' => $producto,
            'message' => 'Producto creado correctamente'
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
        return Producto::findOrFail($id);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductoRequest $request, $id)
    {   
        $producto = Producto::findOrFail($id);
        $producto->update($request->all());
        
        return [
            'data' => $producto,
            'message' => 'Producto editado correctamente'
        ];
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {   
        $producto->delete();

        return [
            "data" => $producto,
            "message" => "Producto archivado correctamente",
        ];
    }


    // Elimina la imagen portada del producto
    // public function removerImagenPortada(Producto $producto){
    //     $producto->imagen_portada = 0;

    //     return [
    //         "data" => $producto,
    //         "message" => "Imagen del producto eliminada correctamente"
    //     ]; 
    // }


}
