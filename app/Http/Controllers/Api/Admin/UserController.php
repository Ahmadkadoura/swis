<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\storeUserRequests;
use App\Http\Requests\User\updateUserRequests;
use App\Http\Resources\UserResource;
use App\Http\Responses\Response;
use App\Models\User;
use App\Services\userService;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    private userService $userService;
    public function __construct(userService $userService)
    {
        $this->userService = $userService;
        $this->middleware(['auth:sanctum']);
    }
    public function index()
    {

        $data=$this->userService->index();
        return $this->showAll($data['User'],UserResource::class,$data['message']);
    }

    public function show(User $user): JsonResponse
    {

        $data = $this->userService->show($user);
        return $this->showAll($data['User'],UserResource::class,$data['message']);

    }
    public function store(storeUserRequests $request): JsonResponse
    {
        $dataUser=$request->validated();

        $data=$this->userService->create($dataUser);
        return $this->showOne($data['User'],UserResource::class,$data['message']);

    }

    public function update(updateUserRequests $request,User $user): JsonResponse
    {
        $dataUser=$request->validated();

        $data = $this->userService->update($dataUser, $user);
        return $this->showOne($data['User'],UserResource::class,$data['message']);

    }


    public function destroy(User $user)
    {
        $data = $this->userService->destroy($user);

      return [$data['message'],$data['code']];

    }

}
