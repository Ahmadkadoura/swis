<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\storeUserRequests;
use App\Http\Requests\User\updateUserRequests;
use App\Http\Resources\UserResource;
use App\Http\Responses\Response;
use App\Models\User;
use App\Services\userService;
use App\Traits\FileUpload;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    use FileUpload;
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

        return $this->showOne($user,UserResource::class);

    }
    public function store(storeUserRequests $request): JsonResponse
    {
        $dataUser=$request->validated();
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $name ='users_image/' . $file->hashName() ;
            $imagePath = $this->createFile($request->file('photo'), User::getDisk(), $name);
            $dataUser['photo'] = $imagePath;
        }

        $data=$this->userService->create($dataUser);
        return $this->showOne($data['User'],UserResource::class,$data['message']);

    }

    public function update(updateUserRequests $request,User $user): JsonResponse
    {
        $dataUser=$request->validated();
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $name ='users_image/' . $file->hashName() ;
            $imagePath = $this->createFile($request->file('photo'), User::getDisk(), $name);
            $dataUser['photo'] = $imagePath;
        }
        $data = $this->userService->update($dataUser, $user);
        return $this->showOne($data['User'],UserResource::class,$data['message']);

    }


    public function destroy(User $user)
    {
        $data = $this->userService->destroy($user);

      return [$data['message'],$data['code']];

    }

}
