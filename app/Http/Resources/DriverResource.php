<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class   DriverResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $driver =$this->driver;
        return [
            'id' => $driver->id,
            'name' => $driver->name,
            'vehicle_number' => $driver->vehicle_number,
            'phone' => $driver->phone,
            'national_id' => $driver->national_id,
            'transportation_company_name' => $driver->transportation_company_name,

        ];
    }
}
