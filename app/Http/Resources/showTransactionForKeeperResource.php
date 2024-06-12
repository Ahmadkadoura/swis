<?php

namespace App\Http\Resources;

use App\Enums\sectorType;
use App\Enums\transactionModeType;
use App\Enums\transactionStatusType;
use App\Enums\transactionType;
use App\Enums\unitType;
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
        $transactionWarehouseItem=$this->transactionWarehouseItem;
//        dd($this->transactionWarehouseItem);
        return [
            'transaction_id' => $this->id,
            'donor_id' => $this->user->name,
            'is_convoy' =>$this->is_convoy,
            'notes' => $this->notes,
            'code' => $this->code,
            'status' => $this->status instanceof transactionStatusType ? $this->status->name : null,
            'date' => $this->date,
            'waybill_num' => $this->waybill_num,
            'waybill_img' => $this->imageUrl('waybill_img'),
            'qr_code' => $this->imageUrl('qr_code'),
            'CTN' => $this->CTN,
            'transactionWarehouse'=>$transactionWarehouseItem->map(function ($item){
                return [
                    'transaction_type' => $item->transaction_type instanceof transactionType ? $item->transaction_type->name : null,
                    'transaction_mode_type' => $item->transaction_mode_type instanceof transactionModeType ? $item  ->transaction_mode_type->name : null,
                    'warehouse' => $item->warehouse->id,];
            }),
            'items'=> $this->transactionWarehouseItem->map(function ($item){
                   return new showKeeperItemResource($item);
            }),
            'driver'=> $this->driverTransaction->map(function ($driver){
                    return new DriverResource($driver);
            }),

            ];

    }

}
