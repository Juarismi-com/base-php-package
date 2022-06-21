<?php

namespace Juarismi\Base\Observers;

use Juarismi\Base\Models\Negocio\CompraDetalle;
use Juarismi\Base\Models\Negocio\Stock;

class CompraDetalleObserver
{
    /**
     * Handle the compra detalle "created" event.
     *
     * @param  \App\Models\Negocio\CompraDetalle  $compraDetalle
     * @return void
     */
    public function created(CompraDetalle $compraDetalle)
    {
        $producto_id = $compraDetalle->producto_id;
        $sucursal_id = $compraDetalle->compra->sucursal_id;   

        $stock = Stock::where([
            'producto_id' => $producto_id,
            'sucursal_id' => $sucursal_id
        ])->first();

        if ($stock == NULL){
            $stock  = new Stock;
            $stock->producto_id = $producto_id;
            $stock->sucursal_id = $sucursal_id;
        } 

        $stock->cantidad += $compraDetalle->cantidad;
        $stock->save();
    }

    /**
     * Handle the compra detalle "updated" event.
     *
     * @param  \App\Models\Negocio\CompraDetalle  $compraDetalle
     * @return void
     */
    public function updated(CompraDetalle $compraDetalle)
    {
        //
    }

    /**
     * Handle the compra detalle "deleted" event.
     *
     * @param  \App\Models\Negocio\CompraDetalle  $compraDetalle
     * @return void
     */
    public function deleted(CompraDetalle $compraDetalle)
    {
        //
    }

    /**
     * Handle the compra detalle "restored" event.
     *
     * @param  \App\Models\Negocio\CompraDetalle  $compraDetalle
     * @return void
     */
    public function restored(CompraDetalle $compraDetalle)
    {
        //
    }

    /**
     * Handle the compra detalle "force deleted" event.
     *
     * @param  \App\Models\Negocio\CompraDetalle  $compraDetalle
     * @return void
     */
    public function forceDeleted(CompraDetalle $compraDetalle)
    {
        //
    }
}
