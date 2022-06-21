<?php

namespace Juarismi\Base\Http\Resources\Compra;

use Illuminate\Http\Resources\Json\JsonResource;

class CompraBasicResource extends JsonResource
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
            'id' => $this->id,
            'nro_factura' => $this->nro_factura,
            'serie_factura' => $this->serie_factura,
            'fecha_compra' => $this->fecha_compra,
            'condicion_compra' => $this->condicion_compra,
            'monto_total' => $this->monto_total,
            'impuesto_total' => $this->impuesto_total,
            'comprador_id' => $this->comprador_id,
            
            'sucursal_id' => $this->sucursal_id,
            'razonsocial_id' => $this->razonsocial_id,
            'observacion' => $this->observacion,
            'estado' => $this->estado,

            'proveedor_id' => $this->proveedor_id,
            'proveedor_nombre' =>  $this->proveedor->nombre,

            'formapago_id' => $this->formapago_id,
            'formapago_descripcion' => $this->formaPago->descripcion,
        ];
    }
}
