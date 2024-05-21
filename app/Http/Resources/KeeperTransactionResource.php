<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class KeeperTransactionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'transaction'            =>$this->transaction,
            'transaction_type'       =>$this->transaction_type,
            'transaction_mode_type'  =>$this->transaction_mode_type
        ];
    }
}
