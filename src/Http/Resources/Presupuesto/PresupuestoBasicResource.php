<?php

namespace Juarismi\Base\Http\Resources\Presupuesto;

use Illuminate\Http\Resources\Json\JsonResource;

class PresupuestoBasicResource extends JsonResource
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
            "monto_total" => $this->monto_total,
            "observacion" => $this->observacion,
            "ot_id" => $this->ot_id,
            "sucursal_id" => $this->sucursal_id,
            "cliente_id" => $this->cliente_id,
            "vendedor_id" => $this->vendedor_id,
            "tipo_presupuesto" => $this->tipo_presupuesto,
            "comprobantetipo_id" => $this->comprobantetipo_id,
            "fecha" => $this->fecha,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,


            "cliente_nombre" => $this->cliente->nombre,
            "cliente_ci" => $this->cliente->ci,
            "cliente_ruc" => $this->cliente->ruc,
        ];
    }
}
