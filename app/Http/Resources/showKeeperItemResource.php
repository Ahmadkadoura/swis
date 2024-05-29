<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class showKeeperItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->item->id,
            'name' => $this->item->name,
            'code' => $this->item->code,
            'sectorType' => $this->item->sector,
            'unitType' => $this->item->unit,
            'size' => $this->item->size,
            'weight' => $this->item->weight,
            'quantity' => $this->quantity,
        ];
    }
}
