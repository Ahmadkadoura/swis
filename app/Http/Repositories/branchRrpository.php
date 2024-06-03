<?php

namespace App\Http\Repositories;

use App\Models\Branch;

class branchRrpository extends baseRepository
{
    public function __construct(Branch $model)
    {
        parent::__construct($model);
    }
    public function index():array
    {


        $data =Branch::with('parentBranch')->paginate(10);
        if ($data->isEmpty()){
            $message="There are no branch at the moment";
        }else
        {
            $message="Branch indexed successfully";
        }
        return ['message'=>$message,"Branch"=>$data];
    }
}
