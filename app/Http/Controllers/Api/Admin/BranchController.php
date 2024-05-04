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

            $data=$this->branchService->index();
            return Response::Success($data['Branch'],$data['message']);

    }

    public function show(Branch $branch): JsonResponse
    {

            $data = $this->branchService->show($branch);
            return Response::Success($data['Branch'], $data['message'], $data['code']);

    }


    public function create(StoreBranchRequest $request): JsonResponse
    {
        $newData=$request->validate();

            $data=$this->branchService->create($newData);
            return Response::Success($data['Branch'],$data['message']);

    }


    public function update(UpdateBranchRequest $request, Branch $branch): JsonResponse
    {
        $newData=$request->validate();

            $data = $this->branchService->update($newData, $branch);
            return Response::Success($data['Branch'], $data['message'], $data['code']);

    }


    public function destroy(Branch $branch): JsonResponse
    {

            $data = $this->branchService->destroy($branch);
            return Response::Success($data['Branch'], $data['message'], $data['code']);

    }
}
