<?php

namespace Juarismi\Base\Observers;

use Juarismi\Base\Models\Negocio\VentaDetalle;
use Juarismi\Base\Models\Negocio\Stock;

class VentaDetalleObserver
{
    /**
     * Handle the venta detalle "created" event.
     *
     * @param  \App\Models\Negocio\VentaDetalle  $ventaDetalle
     * @return void
     */
    public function created(VentaDetalle $ventaDetalle)
    {   
        try {
            $producto_id = $ventaDetalle->producto_id;
            $sucursal_id = $ventaDetalle->venta->sucursal_id;   

            $stock = Stock::where([
                'producto_id' => $producto_id,
                'sucursal_id' => $sucursal_id
            ])->first();

            if ($stock == NULL){
                throw new \Exception("Stock no encontrado");
            } 

            $stock->cantidad -= $ventaDetalle->cantidad;
            $stock->save();   
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Handle the venta detalle "updated" event.
     *
     * @param  \App\Models\Negocio\VentaDetalle  $ventaDetalle
     * @return void
     */
    public function updated(VentaDetalle $ventaDetalle)
    {
        //
    }

    /**
     * Handle the venta detalle "deleted" event.
     *
     * @param  \App\Models\Negocio\VentaDetalle  $ventaDetalle
     * @return void
     */
    public function deleted(VentaDetalle $ventaDetalle)
    {
        //
    }

    /**
     * Handle the venta detalle "restored" event.
     *
     * @param  \App\Models\Negocio\VentaDetalle  $ventaDetalle
     * @return void
     */
    public function restored(VentaDetalle $ventaDetalle)
    {
        //
    }

    /**
     * Handle the venta detalle "force deleted" event.
     *
     * @param  \App\Models\Negocio\VentaDetalle  $ventaDetalle
     * @return void
     */
    public function forceDeleted(VentaDetalle $ventaDetalle)
    {
        //
    }
}
