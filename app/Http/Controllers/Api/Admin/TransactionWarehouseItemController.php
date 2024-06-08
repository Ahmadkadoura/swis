<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Repositories\transactionWarehousesItemRepository;
use App\Http\Requests\Transaction\storeTransactionWarehouseRequest;
use App\Http\Requests\Transaction\UpdateTransactionWarehouseRequest;
use App\Http\Resources\transactionWarehouseItemResource;
use App\Http\Resources\TransactionWarehouseResource;
use App\Models\transactionWarehouseItems;
use App\Services\TransactionWarehouseService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TransactionWarehouseItemController extends Controller
{
    private transactionWarehousesItemRepository $transactionWarehousesRepository;

    public function __construct(transactionWarehousesItemRepository $transactionWarehousesRepository)
    {
        $this->transactionWarehousesRepository =$transactionWarehousesRepository;
        $this->middleware(['auth:sanctum']);
    }

    public function index(): JsonResponse
    {

        $data = $this->transactionWarehousesRepository->index();
        return $this->showAll($data['TransactionWarehouse'], transactionWarehouseItemResource::class, $data['message']);

    }

    public function show(transactionWarehouseItems $transactionWarehousesItem): JsonResponse
    {

        return $this->showOne($transactionWarehousesItem, transactionWarehouseItemResource::class);

    }

    public function store(storeTransactionWarehouseRequest $request): JsonResponse
    {
        $dataItem = $request->validated();

        $data = $this->transactionWarehousesRepository->create($dataItem);
        return $this->showOne($data['TransactionWarehouse'], transactionWarehouseItemResource::class, $data['message']);

    }

    public function update(UpdateTransactionWarehouseRequest $request, transactionWarehouseItems $transactionWarehouse): JsonResponse
    {
        $dataItem = $request->validated();

        $data = $this->transactionWarehousesRepository->update($dataItem, $transactionWarehouse);
        return $this->showOne($data['TransactionWarehouse'], transactionWarehouseItemResource::class, $data['message']);

    }


    public function destroy(transactionWarehouseItems $transactionWarehouse)
    {
        $data = $this->transactionWarehousesRepository->destroy($transactionWarehouse);
        return [$data['message'], $data['code']];

    }

    public function showDeleted(): JsonResponse
    {
        $data=$this->transactionWarehousesRepository->showDeleted();
        return $this->showAll($data['TransactionWarehouse'],transactionWarehouseItemResource::class,$data['message']);
    }
    public function restore(Request $request){

        $data = $this->transactionWarehousesRepository->restore($request);
        return [$data['message'],$data['code']];
    }

}
