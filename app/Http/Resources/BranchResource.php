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
            'main_branch' => [
                'id' =>$this->parent_id,
                'name' =>$this->parentBranch->name ?? null,
            ],
            'phone'     => $this->phone,
            'address'   => $this->address,
        ];
    }
}
