<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AuthServices
{
    public function register($request):array
    {
        $User=User::create([
            'name'=>$request['name'],
            'email'=>$request['email'],
            'password'=>Hash::make($request['name']),
        ]);
        $roles=Role::where('name','clientDDD');
        $User->assignRole($roles);

        $permissions=$roles->permissions()->pluck()->toArray();
        $roles->givePermissionTo($permissions);


        $User->load('roles','permissions');

        $User=User::find($User['id']);
        $User= $this->RolesAndPermissions($User);
        $User['token']=$User->createToken("token")->plainTextToken;

        $message='User created successfully.';
        return['User'=>$User,'message'=>$message];

    }
    public function login($request):array
    {
        $user= User::where('email',$request['email'])
            ->first();
        if(!is_null($user)){
            if(!Auth::attempt($request->only(['email','password']))){
                $message= 'User email & password dose not match with our record.';
                $code= 401;
            }else{
                $user= $this->RolesAndPermissions($user);
                $user['token']=$user->createToken("token")->plainTextToken;
                $message='User logged in successfully.';
                $code=200;
            }
        }else
        {
            $message='User not found.';
            $code=404;
        }
        return['User'=>$user,'message'=>$message,'code'=>$code];
    }
    public function logout():array
    {
        $user=Auth::user();
        if(!is_null(Auth::user()))
        {
            Auth::user()->currentAccessToken()->delete();
            $message='User logged out successfully.';
            $code=200;
        }else{
            $message='invalid token.';
            $code=404;
        }
        return['User'=>$user,'message'=>$message,'code'=>$code];
    }

    public function RolesAndPermissions($user)
    {
        $roles=[];
        foreach ($user->roles as $role)
        {
            $roles=$role['name'];
        }
        unset($user['roles']);
        $user['roles']=$roles;

        $permissions=[];
        foreach ($user->permissions as $permission)
        {
            $permissions=$permission['name'];
        }
        unset($user['permissions']);
        $user['permissions']=$roles;

        return $user;
    }

}
