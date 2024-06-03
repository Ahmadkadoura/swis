<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AdminDriverResource extends JsonResource
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
            'vehicle_number' => $this->vehicle_number,
            'phone' => $this->phone,
            'national_id' => $this->national_id,
            'transportation_company_name' => $this->transportation_company_name,

        ];
    }
}
