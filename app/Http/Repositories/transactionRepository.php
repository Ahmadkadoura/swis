<?php

namespace App\Http\Repositories;

use App\Models\Donor;
use App\Models\Item;
use App\Models\Transaction;
use App\Models\transactionDriver;
use App\Models\transactionWarehouseItem;
use App\Models\Warehouse;
use Illuminate\Support\Facades\Auth;

class transactionRepository extends baseRepository
{
    public function __construct(Transaction $model)
    {
        parent::__construct($model);
    }
    public function index():array
    {

        $data =Transaction::with(['user','transactionWarehouseItem.warehouse','transactionWarehouseItem.item'])
            ->paginate(10);
        if ($data->isEmpty()){
            $message="There are no Transaction at the moment";
        }else
        {
            $message="Transaction indexed successfully";
        }
        return ['message'=>$message,"Transaction"=>$data];
    }
    public function create( $dataItem): array
    {
        $transaction=Transaction::create([
            'user_id' => Auth::id(),
            'is_convoy' => $dataItem['is_convoy'],
            'notes' => $dataItem['notes'] ?? null,
            'Waybill_num' => $dataItem['waybill_num'],
            'waybill_img' => $dataItem['waybill_img'],
            'status' => $dataItem['status'],
            'date' => $dataItem['date'],
            'CTN' => $dataItem['CTN'] ?? null,
            'qr_code' => $dataItem['qr_code'] ?? null,]);

        if (isset($dataItem['items']) && is_array($dataItem['items'])) {
            foreach ($dataItem['items'] as $itemData) {
                $transactionItem = TransactionWarehouseItem::create([
                    'transaction_id' => $transaction->id,
                    'warehouse_id' => $itemData['warehouse_id'],
                    'item_id' => $itemData['item_id'],
                    'quantity' => $itemData['quantity'],
                    'transaction_type' => $itemData['transaction_type'],
                    'transaction_mode_type' => $itemData['type'],
                ]);
            }
        }

        if (isset($dataItem['drivers']) && is_array($dataItem['drivers'])) {
            foreach ($dataItem['drivers'] as $driver) {
                TransactionDriver::create([
                    'transaction_id' => $transaction->id,
                    'driver_id' => $driver['driver_id'],
                ]);
            }
        }
        $message="Transactions created successfully";
        return ['message'=>$message,"Transaction"=>$transaction];
    }
//    public function update($transactionId, $dataItem): array
//    {
//        $transaction = Transaction::find($transactionId);
//
//        if (!$transaction) {
//            $message = "Transaction not found with ID: {$transactionId}";
//            return ['message' => $message];
//        }
//
//        $transaction->update([
//            'user_id' => Auth::id(),
//            'is_convoy' => $dataItem['is_convoy'],
//            'notes' => $dataItem['notes'] ?? null,
//            'Waybill_num' => $dataItem['waybill_num'],
//            'waybill_img' => $dataItem['waybill_img'],
//            'status' => $dataItem['status'],
//            'date' => $dataItem['date'],
//            'CTN' => $dataItem['CTN'] ?? null,
//            'qr_code' => $dataItem['qr_code'] ?? null,
//        ]);
//
//        // Update items
//        if (isset($dataItem['items']) && is_array($dataItem['items'])) {
//            // Delete existing items related to this transaction
//            TransactionWarehouseItem::where('transaction_id', $transactionId)->delete();
//
//            // Insert updated items
//            foreach ($dataItem['items'] as $itemData) {
//                TransactionWarehouseItem::create([
//                    'transaction_id' => $transaction->id,
//                    'warehouse_id' => $itemData['warehouse_id'],
//                    'item_id' => $itemData['item_id'],
//                    'quantity' => $itemData['quantity'],
//                    'transaction_type' => $itemData['transaction_type'],
//                    'transaction_mode_type' => $itemData['type'],
//                ]);
//            }
//        }
//
//        // Update drivers (if applicable)
//        if (isset($dataItem['drivers']) && is_array($dataItem['drivers'])) {
//            // Delete existing drivers related to this transaction
//            TransactionDriver::where('transaction_id', $transactionId)->delete();
//
//            // Insert updated drivers
//            foreach ($dataItem['drivers'] as $driverId) {
//                TransactionDriver::create([
//                    'transaction_id' => $transaction->id,
//                    'driver_id' => $driverId,
//                ]);
//            }
//        }
//
//        $message = "Transaction updated successfully";
//        return ['message' => $message, "transaction" => $transaction];
//    }


    public function indexTransactionForKeeper($user_id)
    {
        $data = Warehouse::where('user_id',$user_id)
            ->with('transactionWarehouseItem.transaction')
            ->get();
//        var_dump($data);
        if ($data->isEmpty()){
            $message="There are no transactions at the moment";
        }
        else
        {
            $message="Transactions indexed successfully";
        }
        return ['message'=>$message,"Transaction"=>$data];
    }

    public function showTransactionForKeeper($transaction_id){

        $data = Transaction::where('id', $transaction_id)
            ->with('transactionWarehouseItem.item',
                'transactionWarehouseItem.warehouse',
                'user','driverTransaction.driver')
            ->first();
        return $data;
//        if (!$data){
//            $message="There are no item at the moment";
//        }
//        else
//        {
//            $message="Item showed successfully";
//        }
//        return ['message'=>$message,"transactionWarehouseItem"=>$data];
    }

    public function indexTransactionForDonor($donor_id){
        $data = Transaction::where('user_id',$donor_id)
            ->with('transactionWarehouseItem.item','driverTransaction.driver')
            ->get();
        if ($data->isEmpty()){
            $message="There are no transactions at the moment";
        }
        else
        {
            $message="Transactions indexed successfully";
        }
        return ['message'=>$message,"Transaction"=>$data];
    }

    public function showTransactionForDonor($donor_id,$transactuon_id){
        $data = Transaction::where('user_id',$donor_id)
            ->where('id',$transactuon_id)
            ->with('transactionWarehouseItem.item','driverTransaction.driver')
            ->get();
//        if ($data->isEmpty()){
//            $message="There are no transactions at the moment";
//        }
//        else
//        {
            $message="Transactions indexed successfully";
//        }
        return ['message'=>$message,"Transaction"=>$data];
    }
}
