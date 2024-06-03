<?php

namespace App\Http\Repositories;

use App\Models\Item;
use App\Models\Warehouse;
use App\Models\WarehouseItem;

class itemRepository extends baseRepository
{
    public function __construct(Item $model)
    {
        parent::__construct($model);
    }
    public function indexItemForKeeper($user_id){

        $data = Warehouse::where('user_id',$user_id)
            ->with('WarehouseItem.item')
            ->get();
        if ($data->isEmpty()){
            $message="There are no item at the moment";
        }
        else
        {
            $message="Item indexed successfully";
        }
        return ['message'=>$message,"Item"=>$data];
    }
    public function showItemForKeeper($item_id,$warehouse_id){

        $data = WarehouseItem::where('item_id', $item_id)
            ->where('warehouse_id', $warehouse_id)
            ->with('item')
            ->first();
//        if ($data->isEmpty()){
//            $message="There are no item at the moment";
//        }
//        else
//        {
            $message="Item showed successfully";
//        }
        return ['message'=>$message,"Item"=>$data];
    }
}
