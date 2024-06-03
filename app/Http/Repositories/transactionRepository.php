<?php

namespace App\Http\Repositories;

use App\Models\Donor;
use App\Models\Transaction;
use App\Models\transactionWarehouse;
use App\Models\Warehouse;

class transactionRepository extends baseRepository
{
    public function __construct(Transaction $model)
    {
        parent::__construct($model);
    }
    public function index():array
    {

        $data =Transaction::with(['donor.user','transactionWarehouse.warehouse'])->paginate(10);
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
            ->with('transactionWarehouse.transaction')
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

        $data = transactionWarehouse::where('transaction_id', $transaction_id)
            ->where('warehouse_id', $warehouse_id)
            ->with('transaction.transactionItem.item','transaction.donor.user','transaction.driverTransaction.driver')
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
            ->with('transactionItem.item','driverTransaction.driver')
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
            ->with('transactionItem.item','driverTransaction.driver')
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
