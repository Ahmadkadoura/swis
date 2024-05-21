<?php

namespace App\Services;

use App\Models\Donor;
use App\Models\Transaction;

class TransactionService extends baseServics
{
    public function __construct(Transaction $model)
    {
        parent::__construct($model);
    }
    public function index():array
    {

        $data =Transaction::with('donor.user','warehouse')->paginate(10);
        if ($data->isEmpty()){
            $message="There are no Transaction at the moment";
        }else
        {
            $message="Transaction indexed successfully";
        }
        return ['message'=>$message,"Transaction"=>$data];
    }

    public function showDonor($user_id){
        $donor = Donor::where('user_id',$user_id)->first();
        if($donor==[]){
            return ['message'=>'You are not a donor',"Transaction"=>null];
        }
        $data = Transaction::where('donor_id',$donor->id)
        ->with('transactionItem','transactionItem.item')
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

