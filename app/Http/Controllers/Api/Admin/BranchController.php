<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Branch\StoreBranchRequest;
use App\Http\Requests\Branch\UpdateBranchRequest;
use App\Models\Branch;
use App\Services\branchService;
use Illuminate\Http\Request;
use App\Http\Responses\Response;
use Illuminate\Http\JsonResponse;
use Throwable;


class BranchController extends Controller
{
    private branchService $branchService;

    public function __construct(branchService $branchService)
    {
        $this->branchService = $branchService;
        $this->middleware(['auth:sanctum']);
    }
    public function index(): JsonResponse
    {
        $data =[];
        try {
            $data=$this->branchService->index();
            return Response::Success($data['Branch'],$data['message']);
        }
        catch (Throwable $th){
            $message=$th->getMessage();
            return Response::Error($data,$message);
        }
    }

    public function show(Branch $branch): JsonResponse
    {
        $data = [];
        try {
            $data = $this->branchService->show($branch);
            return Response::Success($data['Branch'], $data['message'], $data['code']);
        } 
        catch (Throwable $th) {
            return Response::Error($data, $th->getMessage());
        }
    }
    

    public function create(StoreBranchRequest $request): JsonResponse
    {
        $newData=$request->validate();
        $data =[];
        try {
            $data=$this->branchService->create($newData);
            return Response::Success($data['Branch'],$data['message']);
        }
        catch (Throwable $th){
            return Response::Error($data, $th->getMessage());
        }
    }


    public function update(UpdateBranchRequest $request, Branch $branch): JsonResponse
    {
        $newData=$request->validate();
        $data = [];
        try {
            $data = $this->branchService->update($newData, $branch);
            return Response::Success($data['Branch'], $data['message'], $data['code']);
        } catch (Throwable $th) {
            return Response::Error($data, $th->getMessage());
        }
    }

    
    public function destroy(Branch $branch): JsonResponse
    {
        $data = [];
        try {
            $data = $this->branchService->destroy($branch);
            return Response::Success($data['Branch'], $data['message'], $data['code']);
        } 
        catch (Throwable $th) {
            return Response::Error($data, $th->getMessage());
        }
    }
}
