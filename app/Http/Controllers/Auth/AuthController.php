<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequests;
use App\Http\Requests\Auth\registerRequests;
use App\Http\Responses\Response;
use App\Services\AuthServices;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Throwable;

class AuthController extends Controller
{

    private AuthServices $authServices;
    public function __construct(AuthServices $authServices)
    {
        $this->authServices = $authServices;
        $this->middleware(['auth:sanctum'])->only('logout');
    }

    public function login(LoginRequests $request):JsonResponse
    {

            $userData=$this->authServices->login($request->validated());

            return Response::Success($userData['User'],$userData['message'],$userData['code']);

    }

    public function logout(Request $request):JsonResponse
    {

            $userData=$this->authServices->logout($request);
            return Response::Success($userData['User'],$userData['message']);

    }

    public function register(registerRequests $request):JsonResponse
    {

            $userData=$this->authServices->register($request->validated());
            return Response::Success($userData['User'],$userData['message']);

    }
}