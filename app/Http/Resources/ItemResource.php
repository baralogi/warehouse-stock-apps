<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ItemResource extends JsonResource
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
            "item_code" => $this->item_code,
            "name" => $this->name,
            "unit" => $this->unit,
            "stock" => $this->stock
        ];
    }
}