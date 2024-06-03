<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Repositories\donorItemRepository;
use App\Http\Requests\Donor\storeDonorItemRequest;
use App\Http\Requests\Donor\UpdateDonorItemRequest;
use App\Http\Resources\DonorItemResource;
use App\Models\donorItem;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DonorItemController extends Controller
{
    private donorItemRepository $donorItemRepository;

    public function __construct(donorItemRepository $donorItemRepository)
    {
        $this->donorItemRepository = $donorItemRepository;
        $this->middleware(['auth:sanctum']);
    }

    public function index(): JsonResponse
    {
        $data = $this->donorItemRepository->index();
        return $this->showAll($data['donorItem'], DonorItemResource::class, $data['message']);
    }

    public function show(donorItem $donorItem): JsonResponse
    {
        $data = $this->donorItemRepository->show($donorItem);
        return $this->showOne($data['donorItem'], DonorItemResource::class, $data['message']);
    }

    public function store(storeDonorItemRequest $request): JsonResponse
    {
        $newData = $request->validated();
        $data = $this->donorItemRepository->create($newData);
        return $this->showOne($data['donorItem'], DonorItemResource::class, $data['message']);
    }

    public function update(UpdateDonorItemRequest $request, donorItem $donorItem): JsonResponse
    {
        $newData = $request->validated();
        $data = $this->donorItemRepository->update($newData, $donorItem);
        return $this->showOne($data['donorItem'], DonorItemResource::class, $data['message']);
    }

    public function destroy(donorItem $donorItem): JsonResponse
    {
        $data = $this->donorItemRepository->destroy($donorItem);
        return response()->json(['message' => $data['message']], $data['code']);
    }

    public function showDeleted(): JsonResponse
    {
        $data = $this->donorItemRepository->showDeleted();
        return $this->showAll($data['donorItem'], DonorItemResource::class, $data['message']);
    }

    public function restore(Request $request): JsonResponse
    {
        $data = $this->donorItemRepository->restore($request);
        return response()->json(['message' => $data['message']], $data['code']);
    }

}
