<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Items\storeItemsRequests;
use App\Http\Requests\User\updateUserRequests;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index():JsonResponse
    {
        $users = User::paginate(5);

        return UserResource::collection($users);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(storeItemsRequests $request):JsonResponse
    {
        $user_data = $request->validated();
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $name = 'users/' . uniqid() . '.' . $file->extension();
            $file->storePubliclyAs('public', $name);
            $user_data['photo'] = $name;
        }
        $user = User::create($user_data);
        return $this->showOne($user, UserResource::class, __('insert successfully'), 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user):JsonResponse
    {
        return new UserResource($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(updateUserRequests $request, User $user):JsonResponse
    {
        $user_data = $request->validated();
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $name = 'users/' . uniqid() . '.' . $file->extension();
            $file->storePubliclyAs('public', $name);
            $user_data['photo'] = $name;
        }
        $user->update($user_data);
        return $this->showOne($user, UserResource::class, __('update successfully'), 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user):JsonResponse
    {
        $user->delete();

        return response(__('deleted successfully'), Response::HTTP_OK);
    }


}
