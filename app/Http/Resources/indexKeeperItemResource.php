<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class indexKeeperItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'items'=>$this->warehouseItem->map(function ($warehouseItem){
                return new ItemInWarehouseResource($warehouseItem);
            }),
            ];
    }
}
