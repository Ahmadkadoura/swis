<?php

namespace App\Http\Repositories;

use App\Models\Donor;
use App\Models\Item;
use App\Models\Transaction;
use App\Models\transactionWarehouseItem;
use App\Models\Warehouse;

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
//    public function create($request): array
//    {
//        $transaction=Transaction::creatre([
//            'user_id' => auth()->user()->id,
//        ]);
//
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
