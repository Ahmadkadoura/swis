<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DonorTransactionResource extends JsonResource
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
            'donor_id' => $this->donor->id,
            'warehouse_id' => $this->warehouse->name,
            'is_convoy' => $this->is_convoy,
            'notes' => $this->notes,
            'code' => $this->code,
            'status' => $this->status,
            'date' => $this->date,
            'waybill_num' => $this->waybill_num,
            'waybill_img' => $this->imageUrl('waybill_img'),
            'qr_code' => $this->qr,
            'items'=>$this->transactionItem->map(function ($transactionItem){
                return new itemsResource($transactionItem->item);
            }),
        ];
    }
}
