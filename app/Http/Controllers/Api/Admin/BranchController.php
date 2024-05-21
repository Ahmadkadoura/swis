<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Branch\StoreBranchRequest;
use App\Http\Requests\Branch\UpdateBranchRequest;
use App\Http\Resources\BranchResource;
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

            $data=$this->branchService->index();
        return $this->showAll($data['Branch'],BranchResource::class,$data['message']);

    }

    public function show(Branch $branch): JsonResponse
    {

        return $this->showOne($branch,BranchResource::class);


    }


    public function store(StoreBranchRequest $request): JsonResponse
    {
        $newData=$request->validated();

            $data=$this->branchService->create($newData);
        return $this->showOne($data['Branch'],BranchResource::class,$data['message']);

    }


    public function update(UpdateBranchRequest $request, Branch $branch): JsonResponse
    {
        $newData=$request->validated();

            $data = $this->branchService->update($newData, $branch);
        return $this->showOne($data['Branch'],BranchResource::class,$data['message']);

    }


    public function destroy(Branch $branch)
    {

            $data = $this->branchService->destroy($branch);
        return [$data['message'],$data['code']];

    }

    public function showDeleted(): JsonResponse
    {
        $data=$this->branchService->showDeleted();
        return $this->showAll($data['Branch'],BranchResource::class,$data['message']);
    }
    public function restore(Request $request){
        
        $data = $this->branchService->restore($request);
        return [$data['message'],$data['code']];
    }
}
