<?php

namespace App\Services;


use Illuminate\Database\Eloquent\Model;

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

        $user_id= Auth()->user()->id;
        $data = model::where('user_id', $user_id)->first();
        $data= $data->latest()->paginate(10);
        if ($data->isEmpty()){
            $message="There are no $modelName at the moment";
        }else
        {
            $message="$modelName indexed successfully";
        }
        return ['message'=>$message,"$modelName"=>$data];
    }
    public function show($id):array
    {
        $modelName = class_basename($this->model);

        $user_id= Auth()->user()->id;
        $data = model::where('user_id', $user_id)
            ->where('id', $id)
            ->first();

        if ($data->isEmpty()){
            $message="There are no $modelName at the moment";
        }else
        {
            $message="$modelName showed successfully";
        }
        return ['message'=>$message,"$modelName"=>$data];
    }
    public function create($request):array
    {
        $modelName = class_basename($this->model);

        $data=model::create();
        $message="$modelName created successfully";
        return ['message'=>$message,"$modelName"=>$data];

    }
    public function update($request,$id):array
    {
        $modelName = class_basename($this->model);

        $data=model::find($id);
        if(!is_null($data))
        {
            if(Auth::user()->hasRole('admin'))
            {
                model::find($id)->update();
            }
            $data=model::find($id);
            $message="$modelName update successfully";
            $code=200;
        }else
        {
            $message="$modelName not found";
            $code=404;
        }
        return ["$modelName"=>$data,'message'=>$message,'code'=>$code];
    }
    public function destroy($id):array
    {
        $modelName = class_basename($this->model);

        $data=model::find($id);
        if(!is_null($data))
        {
            if(Auth::user()->hasRole('admin'))
            {
                $data= model::find($id)->delete();
            }
            $message="$modelName delete successfully";
            $code=200;
        }else
        {
            $message="$modelName not found";
            $code=404;
        }
        return [$modelName=>$data,'message'=>$message,'code'=>$code];
    }

}
