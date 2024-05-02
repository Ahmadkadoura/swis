<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WarehouseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'        => $this->id, 
            'name'      => $this->name,
            'code'      => $this->code,
            'location'  => $this->location,
            'branch_id' => $this->branch_id,
            'capacity'  => $this->capacity,
            'parent_id' => $this->parent_id,
            'user_id'   => $this->user_id,
            
            'is_Distribution_point' =>$this->is_Distribution_point,
            ];
    }
}
