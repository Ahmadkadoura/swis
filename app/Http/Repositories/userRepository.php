<?php

namespace App\Http\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class userRepository extends baseRepository
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
