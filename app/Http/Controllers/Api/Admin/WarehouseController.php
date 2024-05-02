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
        $data =[];
        try {
            $data=$this->warehouseService->index();
            return Response::Success($data['Warehouse'],$data['message']);
        }
        catch (Throwable $th){
            $message=$th->getMessage();
            return Response::Error($data,$message);
        }
    }


    public function show(Warehouse $warehouse): JsonResponse
    {
        $data = [];
        try {
            $data = $this->warehouseService->show($warehouse);
            return Response::Success($data['Warehouse'], $data['message'], $data['code']);
        } 
        catch (Throwable $th) {
            return Response::Error($data, $th->getMessage());
        }
    }


    public function create(StoreWarehouseRequest $request): JsonResponse
    {
        $newData=$request->validate();
        $data =[];
        try {
            $data=$this->warehouseService->create($newData);
            return Response::Success($data['Warehouse'],$data['message']);
        }
        catch (Throwable $th){
            return Response::Error($data, $th->getMessage());
        }
    }


   
    public function update(UpdateWarehouseRequest $request, Warehouse $warehouse): JsonResponse
    {
        $newData=$request->validate();
        $data = [];
        try {
            $data = $this->warehouseService->update($newData, $warehouse);
            return Response::Success($data['Warehouse'], $data['message'], $data['code']);
        } catch (Throwable $th) {
            return Response::Error($data, $th->getMessage());
        }
    }

    
    public function destroy(Warehouse $warehouse): JsonResponse
    {
        $data = [];
        try {
            $data = $this->warehouseService->destroy($warehouse);
            return Response::Success($data['Warehouse'], $data['message'], $data['code']);
        } 
        catch (Throwable $th) {
            return Response::Error($data, $th->getMessage());
        }
    }
}
