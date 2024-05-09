<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Transaction\storeTransactionWarehouseRequest;
use App\Http\Requests\Transaction\UpdateTransactionWarehouseRequest;
use App\Http\Resources\TransactionWarehouseResource;
use App\Models\transactionWarehouse;
use App\Services\TransactionWarehouseService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TransactionWarehouseController extends Controller
{
    private TransactionWarehouseService $transactionWarehouseService;

    public function __construct(TransactionWarehouseService $transactionDriverService)
    {
        $this->TransactionWarehouseService = $transactionDriverService;
        $this->middleware(['auth:sanctum']);
    }

    public function index(): JsonResponse
    {

        $data = $this->TransactionWarehouseService->index();
        return $this->showAll($data['transactionWarehouse'], TransactionWarehouseResource::class, $data['message']);

    }

    public function show(transactionWarehouse $transactionWarehouse): JsonResponse
    {

        return $this->showOne($transactionWarehouse, TransactionWarehouseResource::class);

    }

    public function store(storeTransactionWarehouseRequest $request): JsonResponse
    {
        $dataItem = $request->validated();

        $data = $this->TransactionWarehouseService->create($dataItem);
        return $this->showOne($data['transactionWarehouse'], TransactionWarehouseResource::class, $data['message']);

    }

    public function update(UpdateTransactionWarehouseRequest $request,transactionWarehouse $transactionWarehouse): JsonResponse
    {
        $dataItem = $request->validated();

        $data = $this->TransactionWarehouseService->update($dataItem, $transactionWarehouse);
        return $this->showOne($data['transactionWarehouse'], TransactionWarehouseResource::class, $data['message']);

    }


    public function destroy(transactionWarehouse $transactionWarehouse)
    {
        $data = $this->TransactionWarehouseService->destroy($transactionWarehouse);
        return [$data['message'], $data['code']];

    }
}
