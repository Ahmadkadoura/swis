<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BranchResource extends JsonResource
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
            'parent_id' => $this->parent_id,
            'phone'     => $this->phone,
            'address'   => $this->address,
        ];
    }
}
