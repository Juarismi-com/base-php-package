<?php

namespace Juarismi\Base\Http\Resources\Venta;

use Illuminate\Http\Resources\Json\JsonResource;

class VentaBasicResource extends JsonResource
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
            'fecha_venta' => $this->fecha_venta,
            'condicion_venta' => $this->condicion_venta,
            'monto_total' => $this->monto_total,
            'impuesto_total' => $this->impuesto_total,
            'vendedor_id' => $this->vendedor_id,
            
            'sucursal_id' => $this->sucursal_id,
            'razonsocial_id' => $this->razonsocial_id,
            'comprobantetipo_id' => $this->comprobantetipo_id,
            'observacion' => $this->observacion,
            'estado' => $this->estado,

            'cliente_id' => $this->cliente_id,
            'cliente_nombre' => $this->cliente->nombre,

            'formapago_id' => $this->formapago_id,
            'formapago_descripcion' => $this->formaPago->descripcion,


            'atendedor_id '=> $this->atendedor_id,
            'razon_social' => $this->razon_social,
            'ruc' => $this->ruc,
        ];
    }
}
