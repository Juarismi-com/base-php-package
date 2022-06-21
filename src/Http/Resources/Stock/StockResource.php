<?php

namespace Juarismi\Base\Http\Resources\Stock;

use Illuminate\Http\Resources\Json\JsonResource;

class StockResource extends JsonResource
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
            "cantidad" => $this->cantidad,
            
            "tipo_movimiento" => $this->tipo_movimiento,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,

            // Info de la Sucursal
            "sucursal_id" => $this->sucursal_id,
            "nombre_sucursal" => $this->sucursal->nombre_sucursal,

            // Info del Producto
            "producto_id" => $this->producto_id,
            "producto_codigo" => $this->codigo,
            "producto_nombre" => $this->producto->nombre,
            "producto_impuesto" => $this->producto->impuesto,
            "producto_impuesto_text" => $this->producto->impuesto * 100 . "%"
        ];
    }
}
