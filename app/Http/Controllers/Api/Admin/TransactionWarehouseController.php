<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Repositories\transactionWarehousesRepository;
use App\Http\Requests\Transaction\storeTransactionWarehouseRequest;
use App\Http\Requests\Transaction\UpdateTransactionWarehouseRequest;
use App\Http\Resources\TransactionWarehouseResource;
use App\Models\transactionWarehouse;
use App\Services\TransactionWarehouseService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TransactionWarehouseController extends Controller
{
    private transactionWarehousesRepository $transactionWarehousesRepository;

    public function __construct(transactionWarehousesRepository $transactionWarehousesRepository)
    {
        $this->transactionWarehousesRepository =$transactionWarehousesRepository;
        $this->middleware(['auth:sanctum']);
    }

    public function index(): JsonResponse
    {

        $data = $this->transactionWarehousesRepository->index();
        return $this->showAll($data['TransactionWarehouse'], TransactionWarehouseResource::class, $data['message']);

    }

    public function show(transactionWarehouse $transactionWarehouse): JsonResponse
    {

        return $this->showOne($transactionWarehouse, TransactionWarehouseResource::class);

    }

    public function store(storeTransactionWarehouseRequest $request): JsonResponse
    {
        $dataItem = $request->validated();

        $data = $this->transactionWarehousesRepository->create($dataItem);
        return $this->showOne($data['TransactionWarehouse'], TransactionWarehouseResource::class, $data['message']);

    }

    public function update(UpdateTransactionWarehouseRequest $request,transactionWarehouse $transactionWarehouse): JsonResponse
    {
        $dataItem = $request->validated();

        $data = $this->transactionWarehousesRepository->update($dataItem, $transactionWarehouse);
        return $this->showOne($data['TransactionWarehouse'], TransactionWarehouseResource::class, $data['message']);

    }


    public function destroy(transactionWarehouse $transactionWarehouse)
    {
        $data = $this->transactionWarehousesRepository->destroy($transactionWarehouse);
        return [$data['message'], $data['code']];

    }

    public function showDeleted(): JsonResponse
    {
        $data=$this->transactionWarehousesRepository->showDeleted();
        return $this->showAll($data['TransactionWarehouse'],TransactionWarehouseResource::class,$data['message']);
    }
    public function restore(Request $request){

        $data = $this->transactionWarehousesRepository->restore($request);
        return [$data['message'],$data['code']];
    }
}
