<?php

namespace Juarismi\Base\Http\Resources\Servicio;

use Illuminate\Http\Resources\Json\Resource;

class ServicioResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $imagenPortada = NULL;
        if (isset($this->imagenPortada->path)){
            $imagenPortada = $this->imagenPortada->path;
        }

        return [
            "id" => $this->id, 
            "titulo" => $this->titulo, 
            "descripcion" => $this->descripcion,
            "fecha_publicacion" => $this->fecha_publicacion, 
            "tipo_servicio" => $this->tipo_servicio, 
            "estado" => $this->estado, 
            "codigo_interno" => $this->codigo_interno, 
            "codigo_externo" => $this->codigo_externo, 
            "id_publicador" => $this->id_publicador, 
            "created_at" => $this->created_at, 
            "updated_at" => $this->updated_at, 
            "slug" => $this->slug,
            "imagen_portada" => $this->imagen_portada, 
            "logo" => $this->logo, 
            "imagen_portada_path" => $imagenPortada,
            
            // Compra
            "precio_compra" => $this->precio_defecto,
            "precio_compra_especial" => $this->precio_compra_especial,

            // Venta
            "precio_venta" => $this->precio_venta,
            "precio_venta_especial" => $this->precio_venta_especial,
        ]; 
    }
}
