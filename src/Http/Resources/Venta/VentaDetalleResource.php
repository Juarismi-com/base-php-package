<?php

namespace Juarismi\Base\Http\Resources\Venta;

use Illuminate\Http\Resources\Json\JsonResource;

class VentaDetalleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return $this;
        return [
            
            "id" => $this->id,
            "cantidad" => $this->cantidad,
            "precio" => $this->precio,
            "presupuesto_id" => $this->presupuesto_id,
            "producto_id" => $this->producto_id,
            "precio_x_cantidad" => $this->precio_x_cantidad,
            "porcentaje_comision" => $this->porcentaje_comision,
            "porcentaje_dto" => $this->porcentaje_dto,
            "estado" => $this->estado,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,

             // Info del Producto
            "producto_id" => $this->producto->id,
            "producto_nombre" =>  $this->producto->nombre,
            "producto_presentacion" => $this->producto->presentacion,
            "producto_impuesto_text" => ($this->producto->impuesto * 100) .'%',
            "producto_codigo" => $this->producto->codigo,
        ];
    }
}
