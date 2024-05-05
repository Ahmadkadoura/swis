<?php

namespace App\Services;

use App\Models\Driver;

class driverService extends baseServics
{
    public function __construct(Driver $model)
    {
        parent::__construct($model);
    }
    public function index():array
    {
        $modelName = class_basename($this->model);

        $data = Driver::query();

        $data= $data->latest()->paginate(10);
        if ($data->isEmpty()){
            $message="There are no driver at the moment";
        }else
        {
            $message="Driver indexed successfully";
        }
        return ['message'=>$message,"driver"=>$data];
    }
    public function show($id):array
    {
        $modelName = class_basename($this->model);

        $data = Driver::find($id);


        if ($data->isEmpty()){
            $message="There are no driver at the moment";
        }else
        {
            $message="Driver showed successfully";
        }
        return ['message'=>$message,"driver"=>$data];
    }
}
