<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class itemsResource extends JsonResource
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
            'name' => $this->name,
            'code' => $this->code,
            'sectorType' => $this->sectorType,
            'unitType' => $this->unitType,
            'size' => $this->size,
            'weight' => $this->weight,
            'quantity' => $this->quantity,
        ];
    }
}
