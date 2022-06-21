<?php

namespace Juarismi\Base\Http\Resources\Movimiento;

use Illuminate\Http\Resources\Json\JsonResource;

class MovimientoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $movimientoTipo = $this->movimientoTipo;

        return [
            "id" => $this->id,
            "cliente_id" => $this->cliente_id,
            "proveedor_id" => $this->proveedor_id,
            "empleado_id" => $this->empleado_id,
            "sucursal_id" => $this->sucursal_id,
            "creador_id" => $this->creador_id,
            "caja_id" => $this->caja_id,

            "fecha_creacion" => $this->fecha_creacion,
            "movimientotipo_id" => $this->movimientotipo_id,
            
            "observacion" => $this->observacion,
            "monto_movimiento" => $this->monto_movimiento,
            "saldo_movimiento" => $this->saldo_movimiento,
            "estado" => $this->estado,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,

            // Relacionado al tipo de movimiento
            "mov_tipo_descripcion" => $movimientoTipo->descripcion,
            "tipo_cuenta" => $movimientoTipo->tipo_cuenta,
        ];
    }
}
