<?php

namespace App\Http\Repositories;

use App\Enums\userType;
use App\Models\User;

class donorRepository extends baseRepository
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }
    public function index():array
    {

        $data =User::where('type',userType::donor->value)->paginate(10);
        if ($data->isEmpty()){
            $message="There are no donors at the moment";
        }else
        {
            $message="Donor indexed successfully";
        }
        return ['message'=>$message,"Donor"=>$data];
    }
}
