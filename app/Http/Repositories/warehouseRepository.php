<?php

namespace App\Http\Repositories;

use App\Models\Warehouse;

class warehouseRepository extends baseRepository
{
    public function __construct(Warehouse $model)
    {
        parent::__construct($model);
    }
    public function index():array
    {


        $data =Warehouse::with('user','branch','parentWarehouse','warehouseItem.item')->paginate(10);
        if ($data->isEmpty()){
            $message="There are no Warehouse at the moment";
        }else
        {
            $message="Warehouse indexed successfully";
        }
        return ['message'=>$message,"Warehouse"=>$data];
    }
    public function show($warehouse):array
    {
        $data =$warehouse::where('id',$warehouse->id)
            ->with('user','branch','parentWarehouse','warehouseItem.item')
            ->paginate(10);

        if ($data->isEmpty()){
            $message="There are no Warehouse at the moment";
        }else
        {
            $message="Warehouse indexed successfully";
        }
        return ['message'=>$message,"Warehouse"=>$data];

    }
//    public function create($request):array
//    {
//        $data=Warehouse::create($request);
//        $message="Warehouse created successfully";
//        return ['message'=>$message,"Warehouse"=>$data];
//    }

    public function showWarehouseForKeeper($user_id){

        $data = Warehouse::where('user_id',$user_id)
            ->with('WarehouseItem.item','parentWarehouse')
            ->get();
        if ($data->isEmpty()){
            $message="There are no Warehouse at the moment";
        }
        else
        {
            $message="Warehouse indexed successfully";
        }
        return ['message'=>$message,"Warehouse"=>$data];
    }

}
