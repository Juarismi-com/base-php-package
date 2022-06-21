<?php

namespace Juarismi\Base\Http\Resources\OrdenCompra;

use Illuminate\Http\Resources\Json\JsonResource;

class OrdenCompraDetalleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "presupuesto_id" => $this->presupuesto_id,
            "presupuestodetalle_id" => $this->presupuestodetalle_id,
            "proveedor_id" => $this->proveedor_id,
            "proveedor_nombre" => $this->proveedor->nombre,
            "producto_nombre" => $this->producto->nombre,
            "producto_id" => $this->producto_id,
            "precio_compra" => $this->precio_compra,
            "precio_x_cantidad" => $this->precio_x_cantidad,
            "cantidad" => $this->cantidad,
            "observacion" => $this->observacion,
            "selected" => $this->selected
        ];
    }
}
