<?php

namespace Juarismi\Base\Http\Resources\Proveedor;

use Illuminate\Http\Resources\Json\JsonResource;

class ProveedorBasicResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
