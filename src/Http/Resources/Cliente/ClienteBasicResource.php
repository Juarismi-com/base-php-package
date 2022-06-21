<?php

namespace Juarismi\Base\Http\Resources\Cliente;

use Illuminate\Http\Resources\Json\JsonResource;

class ClienteBasicResource extends JsonResource
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
