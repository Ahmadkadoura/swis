<?php

namespace App\Http\Repositories;

use App\Models\WarehouseItem;

class warehouseItemRepository extends baseRepository
{
    public function __construct(WarehouseItem $model)
    {
        parent::__construct($model);
    }
    public function index():array
    {


        $data =WarehouseItem::with('item','warehouse')->paginate(10);
        if ($data->isEmpty()){
            $message="There are no item at the moment";
        }else
        {
            $message="Item indexed successfully";
        }
        return ['message'=>$message,"WarehouseItem"=>$data];
    }

}
