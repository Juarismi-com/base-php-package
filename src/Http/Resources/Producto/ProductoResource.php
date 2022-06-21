<?php

namespace Juarismi\Base\Http\Resources\Producto;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductoResource extends JsonResource
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
            "id" =>  $this->id,
            "nombre" =>  $this->nombre,
            "descripcion" =>  $this->descripcion,
            "presentacion" =>  $this->presentacion,
            "fecha_publicacion" =>  $this->fecha_publicacion,
            "publicador_id" =>  $this->publicador_id,
            "productotipo_id" =>  $this->productotipo_id,
            "marca_id" =>  $this->marca_id,
            "modelo_id" =>  $this->modelo_id,
            "imagen_path" =>  $this->imagen_path,
            "estado" =>  $this->estado,
            "codigo" =>  $this->codigo,
            "codigo_externo" =>  $this->codigo_externo,
            "codigo_barras" =>  $this->codigo_barras,
            "slug" =>  $this->slug,
            "precio_vta" =>  $this->precio_vta,
            "precio_vta2" =>  $this->precio_vta2,
            "precio_vta3" =>  $this->precio_vta3,
            "precio_vta4" =>  $this->precio_vta4,
            "precio_vta5" =>  $this->precio_vta5,
            "precio_compra" =>  $this->precio_compra,
            "impuesto" =>  $this->impuesto,
            "moneda_id" =>  $this->moneda_id,
            "fecha_replicacion" =>  $this->fecha_replicacion,
            "stock_actual" =>  $this->stock_actual,
            "stock_minimo" =>  $this->stock_minimo,
            "created_at" =>  $this->created_at,
            "updated_at" =>  $this->updated_at,
            "impuesto_text" => ( $this->impuesto * 100 ) . "%"
        ];
    }
}
