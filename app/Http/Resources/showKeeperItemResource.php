<?php

namespace App\Http\Resources;

use App\Enums\sectorType;
use App\Enums\unitType;
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
        $item=$this->item;
        return [
            'id' => $item->id,
            'name' => $item->name,
            'code' => $item->code,
            'sectorType' => $item->sectorType instanceof sectorType ? $item->sectorType->name : null,
            'unitType' => $item->unitType instanceof unitType ? $item->unitType->name : null,
            'size' => $item->size,
            'weight' => $item->weight,
            'quantity' => $this->quantity,
        ];
    }
}
