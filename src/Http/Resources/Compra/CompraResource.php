<?php

namespace Juarismi\Base\Http\Resources\Compra;

use Illuminate\Http\Resources\Json\JsonResource;

class CompraResource extends JsonResource
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
            'nro_factura' => $this->nro_factura,
            'serie_factura' => $this->serie_factura,
            'fecha_compra' => $this->fecha_compra,
            'condicion_compra' => $this->condicion_compra,
            'monto_total' => $this->monto_total,
            'impuesto_total' => $this->impuesto_total,
            'proveedor_id' => $this->proveedor_id,
            'comprador_id' => $this->comprador_id,
            'sucursal_id' => $this->sucursal_id,
            'razonsocial_id' => $this->razonsocial_id,
            'observacion' => $this->observacion,
            'estado' => $this->estado,
            'formapago_id' => $this->formapago_id,

            'compra_detalle' => CompraDetalleResource::collection(
                $this->compraDetalle
            ),

            'proveedor' => $this->proveedor,

            'sucursal' => $this->sucursal,

            'forma_pago' => $this->formaPago
        ];
    }
}
