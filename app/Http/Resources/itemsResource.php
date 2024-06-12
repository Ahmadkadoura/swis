<?php

namespace App\Http\Resources;

use App\Enums\sectorType;
use App\Enums\unitType;
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
            'sectorType' => $this->sectorType instanceof sectorType ? $this->sectorType->name : null,
            'unitType' => $this->unitType instanceof unitType? $this->unitType->name : null,
            'size' => $this->size,
            'weight' => $this->weight,
            'quantity in the system' => $this->quantity,
        ];
    }
}
