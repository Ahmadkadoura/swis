<?php

namespace App\Http\Repositories;

use App\Models\Donor;
use App\Models\Transaction;
use App\Models\transactionWarehouseItems;
use App\Models\Warehouse;

class transactionRepository extends baseRepository
{
    public function __construct(Transaction $model)
    {
        parent::__construct($model);
    }
    public function index():array
    {

        $data =Transaction::with(['donor.user','transactionWarehouseItem.warehouse','transactionWarehouseItem.item'])
            ->paginate(10);
        if ($data->isEmpty()){
            $message="There are no Transaction at the moment";
        }else
        {
            $message="Transaction indexed successfully";
        }
        return ['message'=>$message,"Transaction"=>$data];
    }
    public function indexTransactionForKeeper($user_id)
    {
        $data = Warehouse::where('user_id',$user_id)
            ->with('transactionWarehouseItems.transaction')
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

    public function showTransactionForKeeper($transaction_id,$warehouse_id){

        $data = transactionWarehouseItems::where('transaction_id', $transaction_id)
            ->where('warehouse_id', $warehouse_id)
            ->with('item','transaction.donor.user','transaction.driverTransaction.driver')
            ->first();

        if (!$data){
            $message="There are no item at the moment";
        }
        else
        {
            $message="Item showed successfully";
        }
        return ['message'=>$message,"Item"=>$data];
    }

    public function indexTransactionForDonor($donor_id){
        $data = Transaction::where('donor_id',$donor_id)
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
        $data = Transaction::where('donor_id',$donor_id)
            ->where('id',$transactuon_id)
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
}
