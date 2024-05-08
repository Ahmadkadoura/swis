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
        $this->DonorService = $donorService;
        $this->middleware(['auth:sanctum']);
    }
    public function index(): JsonResponse
    {

        $data=$this->DonorService->index();
        return $this->showAll($data['Donor'],DonorResource::class,$data['message']);

    }

    public function show(Donor $donor): JsonResponse
    {

        $data = $this->DonorService->show($donor);
        return $this->showAll($data['Donor'],DonorResource::class,$data['message']);

    }


    public function store(storeDonorRequest $request): JsonResponse
    {
        $newData=$request->validated();

        $data=$this->DonorService->create($newData);
        return $this->showOne($data['Donor'],DonorResource::class,$data['message']);

    }


    public function update(UpdateDonorRequest $request, Donor $donor): JsonResponse
    {
        $newData=$request->validated();

        $data = $this->DonorService->update($newData, $donor);
        return $this->showOne($data['Donor'],DonorResource::class,$data['message']);

    }


    public function destroy(Donor $donor)
    {

        $data = $this->DonorService->destroy($donor);
        return [$data['message'],$data['code']];

    }
}
