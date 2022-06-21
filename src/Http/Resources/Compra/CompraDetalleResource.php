<?php

namespace Juarismi\Base\Http\Resources\Compra;

use Illuminate\Http\Resources\Json\JsonResource;

class CompraDetalleResource extends JsonResource
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
            "compra_id" => $this->compra_id,
            "precio" => $this->precio,
            "precio_defecto" => $this->precio_defecto,
            "nro_factura" => $this->nro_factura,
            "serie_factura" => $this->serie_factura,
            "concepto" => $this->concepto,
            "impuesto" => $this->impuesto,
            "cantidad" => $this->cantidad,
            "fecha" => $this->fecha,
            "estado" => $this->estado,
            "observacion" => $this->observacion,
            "precio_x_cantidad" => $this->precio_x_cantidad,
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
