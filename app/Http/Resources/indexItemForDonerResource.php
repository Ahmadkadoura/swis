<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class indexItemForDonerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'donor' => $this->donor->user->name,
            'items'=>$this->item->map(function (){
                return ['id' => $this->id,
                    'name' => $this->name,
                    'code' => $this->code,
                    'sectorType' => $this->sectorType,
                    'unitType' => $this->unitType,
                    'size' => $this->size,
                    'weight' => $this->weight,];}),
            'quantity' => $this->quantity,
        ];
    }
}
