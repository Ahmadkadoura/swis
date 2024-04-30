<?php

namespace App\Services;

use App\Models\Item;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;

class itemService
{
public function index():array
{
    if(Auth::user()->hasRole('keeper')){
     //get warehouse item for this user
    }
    elseif (Auth::user()->hasRole('donor'))
    {
        //get warehouse item for this user
    }
    else
    {
        $items = Item::query();
    }
    $items= $items->latest()->paginate(10);
    if ($items->isEmpty()){
        $message="There are no item at the moment";
    }else
    {
        $message="Item indexed successfully";
    }
    return ['message'=>$message,'item'=>$items];
}
    public function show($id):array
    {
        if(Auth::user()->hasRole('keeper')){
            //get warehouse item for this user
        }
        elseif (Auth::user()->hasRole('donor'))
        {
            //get warehouse item for this user
        }
        else
        {
            $items = Item::query()->find($id);
        }

        if ($items->isEmpty()){
            $message="There are no item at the moment";
        }else
        {
            $message="Item showed successfully";
        }
        return ['message'=>$message,'item'=>$items];
    }
public function create($request):array
{
    $item=Item::query()->create();
    $message="Item created successfully";
    return ['message'=>$message,'item'=>$item];

}
    public function update($request,$id):array
    {
        $item=Item::query()->find($id);
        if(!is_null($item))
        {
            if(Auth::user()->hasRole('admin'))
            {
                Item::query()->find($id)->update();
            }
            $item=Item::query()->find($id);
            $message="Item update successfully";
            $code=200;
        }else
        {
            $message="Item not found";
            $code=404;
        }
        return ['item'=>$item,'message'=>$message,'code'=>$code];
    }
    public function destroy($id):array
    {
        $item=Item::query()->find($id);
        if(!is_null($item))
        {
            if(Auth::user()->hasRole('admin'))
            {
                $item= Item::query()->find($id)->delete();
            }
            $message="Item delete successfully";
            $code=200;
        }else
        {
            $message="Item not found";
            $code=404;
        }
        return ['item'=>$item,'message'=>$message,'code'=>$code];
    }

}
