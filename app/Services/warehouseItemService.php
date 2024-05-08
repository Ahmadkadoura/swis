<?php

namespace App\Services;

use App\Models\WarehouseItem;

class warehouseItemService extends baseServics
{
    public function __construct(WarehouseItem $model)
    {
        parent::__construct($model);
    }
    public function index():array
    {


        $data =WarehouseItem::with('item')->paginate(10);
        if ($data->isEmpty()){
            $message="There are no item at the moment";
        }else
        {
            $message="Item indexed successfully";
        }
        return ['message'=>$message,"WarehouseItem"=>$data];
    }
}
