<?php

namespace App\Http\Repositories;

use App\Models\Donor;

class donorRepository extends baseRepository
{
    public function __construct(Donor $model)
    {
        parent::__construct($model);
    }
    public function index():array
    {

        $data =Donor::with('user')->paginate(10);
        if ($data->isEmpty()){
            $message="There are no donors at the moment";
        }else
        {
            $message="Donor indexed successfully";
        }
        return ['message'=>$message,"Donor"=>$data];
    }
}
