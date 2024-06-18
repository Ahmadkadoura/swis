<?php

namespace App\Http\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class baseRepository
{
    protected Model $model;
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

    public function create( $request):array
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

    public function showDeleted():array
    {
        $modelName = class_basename($this->model);

        $data =$this->model::onlyTrashed()->get()->all();
        if (!$data){
            $message="There are no $modelName deleted at the moment";
        }else
        {
            $message="$modelName indexed successfully";
        }
        return ['message'=>$message,"$modelName"=>$data];
    }

    public function restore($request)
    {
        $ids = $request->input('ids');
        if($ids != null)
        {
            foreach($ids as $id)
            {
                $model = $this->model::onlyTrashed()->find($id);
                if($model) $model->restore();

            }
            $message="restored successfully";
            $code=200;
        }
        else
        {
            $message="objects must be sended";
            $code=404;
        }
        return ['message'=>$message,'code'=>$code];
    }

}
