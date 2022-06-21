<?php

namespace Juarismi\Base\Http\Controllers;

use Illuminate\Http\Request;
use Juarismi\Base\Models\Negocio\Stock;
use Juarismi\Base\Http\Resources\Stock\StockResource;

class StockController extends AppController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // filtros 
        $q = $request->input('q', NULL);

        // pagination
        $rows = $request->input('rows', 20);

        if ($q != NULL){
            $stock = Stock::with('producto')
                ->whereHas('producto', function($query) use ($q){
                    $query->where('nombre', 'like', '%' . $q . '%')
                        ->orWhere('codigo', $q);
                });

        } else {
            $stock = new Stock;
        }

        return StockResource::collection($stock->paginate($rows));
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
        //
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
