<?php

namespace App\Http\Repositories;

use App\Models\transactionItem;

class transactionItemRepository extends baseRepository
{
    public function __construct(transactionItem $model)
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
