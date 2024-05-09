<?php

namespace App\Services;

use App\Models\transactionDriver;
use App\Models\transactionItem;

class TransactionItemService extends baseServics
{
    public function __construct(transactionDriver $model)
    {
        parent::__construct($model);
    }
    public function index():array
    {

        $data =transactionItem::with('item','transaction')->paginate(10);
        if ($data->isEmpty()){
            $message="There are no transaction item at the moment";
        }else
        {
            $message="Transaction item indexed successfully";
        }
        return ['message'=>$message,"TransactionItem"=>$data];
    }
}

