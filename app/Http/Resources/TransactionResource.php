<?php

namespace App\Http\Resources;

use App\Enums\transactionStatusType;
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
            'donor_id' => $this->donor->user->name,
            'warehouse_id' => $this->warehouse->name,
            'is_convoy' => $this->is_convoy,
            'notes' => $this->notes,
            'code' => $this->code,
            'status' => $this->status,
            'date' => $this->date,
            'waybill_num' => $this->waybill_num,
            'waybill_img' => $this->waybill_img,
            'qr' => $this->qr,
            ];
    }
}
