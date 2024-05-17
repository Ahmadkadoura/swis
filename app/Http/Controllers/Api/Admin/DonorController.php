<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Donor\storeDonorRequest;
use App\Http\Requests\Donor\UpdateDonorRequest;
use App\Http\Resources\DonorResource;
use App\Models\Donor;
use App\Services\DonorService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DonorController extends Controller
{
    private DonorService $donorService;

    public function __construct(DonorService $donorService)
    {
        $this->donorService = $donorService;
        $this->middleware(['auth:sanctum']);
    }
    public function index(): JsonResponse
    {

        $data=$this->donorService->index();
        return $this->showAll($data['Donor'],DonorResource::class,$data['message']);

    }

    public function show(Donor $donor): JsonResponse
    {

        return $this->showAll($donor,DonorResource::class);

    }


    public function store(storeDonorRequest $request): JsonResponse
    {
        $newData=$request->validated();

        $data=$this->donorService->create($newData);
        return $this->showOne($data['Donor'],DonorResource::class,$data['message']);

    }


    public function update(UpdateDonorRequest $request, Donor $donor): JsonResponse
    {
        $newData=$request->validated();

        $data = $this->donorService->update($newData, $donor);
        return $this->showOne($data['Donor'],DonorResource::class,$data['message']);

    }


    public function destroy(Donor $donor)
    {

        $data = $this->donorService->destroy($donor);
        return [$data['message'],$data['code']];

    }

    public function showDeleted(): JsonResponse
    {
        $data=$this->donorService->showDeleted();
        return $this->showAll($data['Donor'],DonorResource::class,$data['message']);
    }
    public function restore(Request $request){
        
        $data = $this->donorService->restore($request);
        return [$data['message'],$data['code']];
    }
}
