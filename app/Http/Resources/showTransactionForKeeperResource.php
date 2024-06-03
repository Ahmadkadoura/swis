<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class showTransactionForKeeperResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'transaction_id' => $this->transaction_id,
            'warehouse' => $this->warehouse->name,
            'donor_id' => $this->transaction->donor->user->name,
            'is_convoy' => $this->transaction->is_convoy,
            'notes' => $this->transaction->notes,
            'code' => $this->transaction->code,
            'status' => $this->transaction->status,
            'date' => $this->transaction->date,
            'waybill_num' => $this->transaction->waybill_num,
            'waybill_img' => $this->transaction->imageUrl('waybill_img'),
            'qr_code' => $this->transaction->qr,
            'CTN' => $this->transaction->CTN,
            'transaction_type' => $this->transaction_type,
            'transaction_mode_type' => $this->transaction_mode_type,
            'items'=> $this->transaction->transactionItem ->map(function ($item){
        return new showKeeperItemResource($item);}),
            'driver'=> $this->transaction->driverTransaction->map(function ($driver){
        return new DriverResource($driver);
            }),

            ];

    }
}
