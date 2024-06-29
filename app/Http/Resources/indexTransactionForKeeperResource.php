<?php

namespace App\Http\Resources;

use App\Enums\transactionModeType;
use App\Enums\transactionType;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class indexTransactionForKeeperResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [

            'transaction' => $this->transactionWarehouseItem->map(function ($transactionWarehouse) {
                return [
                    'id' => $transactionWarehouse->transaction->id,
                    'donor_id' => $transactionWarehouse->transaction->user->name,
                    'warehouse_id' => $transactionWarehouse->warehouse->name,
                    'is_convoy' => $transactionWarehouse->transaction->is_convoy,
                    'notes' => $transactionWarehouse->transaction->notes,
                    'code' => $transactionWarehouse->transaction->code,
                    'status' => $transactionWarehouse->transaction->status,
                    'date' => $transactionWarehouse->transaction->date,
                    'waybill_num' => $transactionWarehouse->transaction->waybill_num,
                    'waybill_img' => $transactionWarehouse->transaction->imageUrl('waybill_img'),
                    'qr_code' => $transactionWarehouse->transaction->imageUrl('qr_code'),
                    'CTN' => $transactionWarehouse->transaction->CTN,
                    'transaction_type' => $transactionWarehouse->transaction_type instanceof transactionType ? $transactionWarehouse->transaction_type->name : null,
                    'transaction_mode_type' => $transactionWarehouse->transaction_mode_type instanceof transactionModeType ? $transactionWarehouse->transaction_mode_type->name : null,
                ];
            }),
            ];
    }
}
