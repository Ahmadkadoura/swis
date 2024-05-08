<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\WarehouseItemResource;
use App\Models\WarehouseItem;
use App\Services\warehouseItemService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class WarehouseItemController extends Controller
{
    private warehouseItemService $warehouseItemService;

    public function __construct(warehouseItemService $warehouseItemService)
    {
        $this->warehouseItemService = $warehouseItemService;
        $this->middleware(['auth:sanctum']);
    }


    public function index(): JsonResponse
    {

        $data = $this->warehouseItemService->index();
        return $this->showAll($data['WarehouseItem'], WarehouseItemResource::class, $data['message']);

    }


    public function show(WarehouseItem $warehouseItem): JsonResponse
    {

        $data = $this->warehouseItemService->show($warehouseItem);
        return $this->showAll($data['WarehouseItem'], WarehouseItemResource::class, $data['message']);

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

        $data = $this->warehouseItemService->destroy($warehouseItem);
        return [$data['message'], $data['code']];

    }
}
