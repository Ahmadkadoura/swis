<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DonorItemResource extends JsonResource
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
            'donor' => $this->donor->user->name,
            'items'=>$this->item->map(function ($Item){
                return new itemsResource($Item);}),
            'quantity from this donor' => $this->quantity,
        ];
    }
}
