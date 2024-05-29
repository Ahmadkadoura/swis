<?php

namespace App\Http\Repositories;

use App\Models\transactionWarehouse;

class transactionWarehousesRepository extends baseRepository
{
    public function __construct(transactionWarehouse $model)
    {
        parent::__construct($model);
    }
    public function index():array
    {

        $data =transactionWarehouse::with('warehouse','transaction')->paginate(10);
        if ($data->isEmpty()){
            $message="There are no transaction in this warehouse at the moment";
        }else
        {
            $message="Transaction warehouse indexed successfully";
        }
        return ['message'=>$message,"TransactionWarehouse"=>$data];
    }

}
