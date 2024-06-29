<?php

namespace App\Http\Resources;

use App\Enums\transactionModeType;
use App\Enums\transactionStatusType;
use App\Enums\transactionType;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

            // Add more mappings for other enum values as needed

        return [
            'id' => $this->id,
            'user_id' => $this->user->name,
            'is_convoy' => $this->is_convoy,
            'notes' => $this->notes,
            'code' => $this->code,
            'status' => $this->status instanceof transactionStatusType ? $this->status->name : null,
            'date' => $this->date,
            'waybill_num' => $this->waybill_num,
            'waybill_img' => $this->imageUrl('waybill_img'),
            'qr_code' => $this->imageUrl('qr_code'),
            'CTN'=>$this->CTN,
            'details' => $this->transactionWarehouseitem->map(function ($transactionWarehouse) {
                return [ 'transaction_type' => $transactionWarehouse->transaction_type instanceof transactionType ? $transactionWarehouse->transaction_type->name : null,
                    'transaction_mode_type' => $transactionWarehouse->transaction_mode_type instanceof transactionModeType ? $transactionWarehouse->transaction_mode_type->name : null,
                    'item' => $transactionWarehouse->item->name ?? null ,
                    'quantity' => $transactionWarehouse->quantity,];
            }),
        ];
    }
}
