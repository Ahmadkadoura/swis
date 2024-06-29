<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WarehouseItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name'=>$this->warehouse->name ?? null,
           ' item' => [
                'id' =>$this->item_id,
                'name' =>$this->item->name ?? null ],
            'quantity' => $this->quantity,
        ];
    }
}
