<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Auth\AuthRepository;
use App\Http\Requests\Auth\LoginRequests;
use App\Http\Requests\Auth\registerRequests;
use App\Http\Responses\Response;
use App\Services\UserServices;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Throwable;

class AuthController extends Controller
{

    private UserServices $userServices;
    public function __construct(UserServices $userServices)
    {
        $this->userServices = $userServices;
        $this->middleware(['auth:sanctum'])->only('logout');
    }

    public function login(LoginRequests $request):JsonResponse
    {
        $userData =[];
        try {
            $userData=$this->userServices->login($request->validated());
            return Response::Success($userData['User'],$userData['message'],$userData['code']);
        }
        catch (Throwable $th){
            $message=$th->getMessage();
            return Response::Error($userData,$message);
        }
    }

    public function logout():JsonResponse
    {
        $userData =[];
        try {
            $userData=$this->userServices->logout();
            return Response::Success($userData['User'],$userData['message']);
        }
        catch (Throwable $th){
            $message=$th->getMessage();
            return Response::Error($userData,$message);
        }
    }

    public function register(registerRequests $request):JsonResponse
    {
        $userData =[];
        try {
            $userData=$this->userServices->register($request->validated());
            return Response::Success($userData['User'],$userData['message']);
        }
        catch (Throwable $th){
            $message=$th->getMessage();
            return Response::Error($userData,$message);
        }
    }
}
