<?php

namespace App\Services;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class baseServics
{
    protected Model $model;

    /**
     * BaseRepository constructor.
     */
    public function __construct(Model $model)
    {
        $this->model = $model;

    }
    public function index():array
    {
        $modelName = class_basename($this->model);

        $data =$this->model::paginate(10);
        if ($data->isEmpty()){
            $message="There are no $modelName at the moment";
        }else
        {
            $message="$modelName indexed successfully";
        }
        return ['message'=>$message,"$modelName"=>$data];
    }

    public function create($request):array
    {

        $modelName = class_basename($this->model);
        $data=$this->model::create($request);
        $message="$modelName created successfully";
        return ['message'=>$message,"$modelName"=>$data];

    }
    public function update($request, $model): array
    {

        $validatedData=$request;
        $modelName = class_basename($this->model);

       $data = $this->model::find($model->id);
        if (!is_null($data)) {
            if (Auth::user()->hasRole('admin')) {
                // Update the model with the request data
                $data->update($validatedData);

            }
            // Retrieve the updated data
            $data = $this->model::find($model->id);

            $message = "$modelName updated successfully";
            $code = 200;
        } else {
            $message = "$modelName not found";
            $code = 404;
        }

        return ["$modelName" => $data, 'message' => $message, 'code' => $code];
    }

    public function destroy($model):array
    {
        $modelName = class_basename($this->model);

        $data=$this->model::find($model->id);
        if(!is_null($model))
        {
            if(Auth::user()->hasRole('admin'))
            {
                $data=$this->model::find($model->id)->delete();
            }
            $message="$modelName delete successfully";
            $code=200;
        }else
        {
            $message="$modelName not found";
            $code=404;
        }
        return ['message'=>$message,'code'=>$code];
    }

}
