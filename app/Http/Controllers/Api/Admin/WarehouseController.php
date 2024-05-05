<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Warehouse\StoreWarehouseRequest;
use App\Http\Requests\Warehouse\UpdateWarehouseRequest;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use App\Http\Responses\Response;
use App\Services\warehouseService;
use Illuminate\Http\JsonResponse;
use Throwable;

class WarehouseController extends Controller
{

    private warehouseService $warehouseService;

    public function __construct(warehouseService $warehouseService)
    {
        $this->warehouseService = $warehouseService;
        $this->middleware(['auth:sanctum']);
    }


    public function index(): JsonResponse
    {

            $data=$this->warehouseService->index();
            return Response::Success($data['Warehouse'],$data['message']);

    }


    public function show(Warehouse $warehouse): JsonResponse
    {

            $data = $this->warehouseService->show($warehouse);
            return Response::Success($data['Warehouse'], $data['message'], $data['code']);

    }


    public function create(StoreWarehouseRequest $request): JsonResponse
    {
        $newData=$request->validate();

            $data=$this->warehouseService->create($newData);
            return Response::Success($data['Warehouse'],$data['message']);

    }



    public function update(UpdateWarehouseRequest $request, Warehouse $warehouse): JsonResponse
    {
        $newData=$request->validate();

            $data = $this->warehouseService->update($newData, $warehouse);
            return Response::Success($data['Warehouse'], $data['message'], $data['code']);

    }


    public function destroy(Warehouse $warehouse): JsonResponse
    {

            $data = $this->warehouseService->destroy($warehouse);
            return Response::Success($data['Warehouse'], $data['message'], $data['code']);

    }
}
