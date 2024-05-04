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
use Illuminate\Http\Request;

class UserController extends Controller
{
    private userService $userService;
    public function __construct(userService $userService)
    {
        $this->userService = $userService;
        $this->middleware(['auth:sanctum']);
    }
    public function index(): JsonResponse
    {

        $data=$this->userService->index();
        return Response::Success($data['User'],$data['message']);

    }

    public function show(User $user): JsonResponse
    {

        $data = $this->userService->show($user);
        return Response::Success($data['User'], $data['message'], $data['code']);

    }
    public function create(storeUserRequests $request): JsonResponse
    {
        $dataUser=$request->validate();

        $data=$this->userService->create($dataUser);
        return Response::Success($data['User'],$data['message']);

    }

    public function update(updateUserRequests $request,User $user): JsonResponse
    {
        $dataUser=$request->validate();

        $data = $this->userService->update($dataUser, $user);
        return Response::Success($data['User'], $data['message'], $data['code']);

    }


    public function destroy(User $user): JsonResponse
    {
        $data = $this->userService->destroy($user);
        return Response::Success($data['User'], $data['message'], $data['code']);

    }

}
