<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Repositories\warehouseItemRepository;
use App\Http\Resources\WarehouseItemResource;
use App\Models\WarehouseItem;
use App\Services\warehouseItemService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class WarehouseItemController extends Controller
{
    private warehouseItemRepository $warehouseItemRepository;

    public function __construct(warehouseItemRepository $warehouseItemRepository)
    {
        $this->warehouseItemRepository= $warehouseItemRepository;
        $this->middleware(['auth:sanctum']);
    }


    public function index(): JsonResponse
    {

        $data = $this->warehouseItemRepository->index();
        return $this->showAll($data['WarehouseItem'], WarehouseItemResource::class, $data['message']);

    }


    public function show(WarehouseItem $warehouseItem): JsonResponse
    {

        return $this->showOne($warehouseItem, WarehouseItemResource::class);

    }


//    public function store(StoreWarehouseRequest $request): JsonResponse
//    {
//        $newData = $request->validated();
//
//        $data = $this->warehouseService->create($newData);
//        return $this->showOne($data['Warehouse'], WarehouseResource::class, $data['message']);
//
//    }
//
//
//    public function update(UpdateWarehouseRequest $request, Warehouse $warehouse): JsonResponse
//    {
//        $newData = $request->validated();
//
//        $data = $this->warehouseService->update($newData, $warehouse);
//        return $this->showOne($data['Warehouse'], WarehouseResource::class, $data['message']);
//
//    }


    public function destroy(WarehouseItem $warehouseItem)
    {

        $data = $this->warehouseItemRepository->destroy($warehouseItem);
        return [$data['message'], $data['code']];

    }

    public function showDeleted(): JsonResponse
    {
        $data=$this->warehouseItemRepository->showDeleted();
        return $this->showAll($data['WarehouseItem'],WarehouseItemResource::class,$data['message']);
    }
    public function restore(Request $request){

        $data = $this->warehouseItemRepository->restore($request);
        return [$data['message'],$data['code']];
    }
}
