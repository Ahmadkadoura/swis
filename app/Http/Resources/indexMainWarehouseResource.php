<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class indexMainWarehouseResource extends JsonResource
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
            'branch' => [
                'id' =>$this->branch_id,
                'name' =>$this->branch->name ?? null,
            ],
            'Free_capacity'  => $this->capacity,
            'keeper'   => $this->user->name ?? null,

        ];
    }
}
