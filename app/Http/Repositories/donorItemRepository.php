<?php

namespace App\Http\Repositories;

use App\Models\donorItem;

class donorItemRepository extends baseRepository
{
    public function __construct(donorItem $model)
    {
        parent::__construct($model);
    }

    public function index():array
    {

        $data =donorItem::with('user','item')->paginate(10);
        if ($data->isEmpty()){
            $message="There are no donors at the moment";
        }else
        {
            $message="Donor indexed successfully";
        }
        return ['message'=>$message,"Donor"=>$data];
    }
    public function show(donorItem $donorItem)
    {
        $data =$donorItem->with('user','item')->first();
        if ($data->isEmpty()){
            $message="There are no donors item at the moment";
        }else
        {
            $message="Donor item showed successfully";
        }
        return ['message'=>$message,"Donor"=>$data];
    }

    public function indexItemForDonor($donor_id):array
    {

        $data =donorItem::where('user_id', $donor_id)
        ->with('user','item')->paginate(10);
        if ($data->isEmpty()){
            $message="There are no donors at the moment";
        }else
        {
            $message="Donor indexed successfully";
        }
        return ['message'=>$message,"donorItem"=>$data];
    }

    public function showItemForDonor($donor_id,$item_id)
    {
        $data =donorItem::where('user_id', $donor_id)
            ->where('item_id',$item_id)
            ->with('user','item')->first();
//        if ($data->isEmpty()){
//            $message="There are no donors at the moment";
//        }else
//        {
            $message="Donor indexed successfully";
//        }
        return ['message'=>$message,"donorItem"=>$data];
    }
}
