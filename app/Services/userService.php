<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class userService extends baseServics
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function create($request):array
    {
        $request['password'] = Hash::make($request['password']);
        $data=User::create($request);
        $message="User created successfully";
        return ['message'=>$message,"User"=>$data];

    }

}
