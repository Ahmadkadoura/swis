<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AdminTransactionItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->item->id,
            'item' => $this->item->name,
            'quantity' => $this->quantity,
            'transaction' =>
                ['id'=>$this->transaction_id,
                 'code'=>$this->transaction->code,
                ],
        ];
    }
}
