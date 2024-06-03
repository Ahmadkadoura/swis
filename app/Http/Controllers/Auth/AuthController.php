<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Repositories\AuthRepository;
use App\Http\Requests\Auth\LoginRequests;
use App\Http\Requests\Auth\registerRequests;
use App\Http\Responses\Response;
use App\Services\AuthServices;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Throwable;

class AuthController extends Controller
{

    private AuthRepository $authRepository;
    public function __construct(AuthRepository $authRepository)
    {
        $this->AuthRepository = $authRepository;
        $this->middleware(['auth:sanctum'])->only('logout');
    }

    public function login(LoginRequests $request): JsonResponse
    {

        $userData = $this->AuthRepository->login($request->validated());

        return Response::Success($userData['User'], $userData['message'], $userData['code']);
    }

    public function logout(): JsonResponse
    {

        $userData = $this->AuthRepository->logout();
        return Response::Success($userData['User'], $userData['message']);
    }

    public function register(registerRequests $request): JsonResponse
    {

        $userData = $this->AuthRepository->register($request->validated());

        return Response::Success($userData['User'], $userData['message']);
    }
}
