<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Transaction\storeTransactionItemRequest;
use App\Http\Requests\Transaction\UpdateTransactionItemRequest;
use App\Http\Resources\TransactionItemResource;
use App\Models\transactionItem;
use App\Services\TransactionItemService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TransactionItemController extends Controller
{
    private TransactionItemService $transactionItemService;

    public function __construct(TransactionItemService $transactionItemService)
    {
        $this->transactionItemService = $transactionItemService;
        $this->middleware(['auth:sanctum']);
    }

    public function index(): JsonResponse
    {

        $data = $this->transactionItemService->index();
        return $this->showAll($data['TransactionItem'], TransactionItemResource::class, $data['message']);

    }

    public function show(transactionItem $transactionItem): JsonResponse
    {

        return $this->showOne($transactionItem, TransactionItemResource::class);

    }

    public function store(storeTransactionItemRequest $request): JsonResponse
    {
        $dataItem = $request->validated();

        $data = $this->transactionItemService->create($dataItem);
        return $this->showOne($data['TransactionItem'], TransactionItemResource::class, $data['message']);

    }

    public function update(UpdateTransactionItemRequest $request,transactionItem $transactionItem): JsonResponse
    {
        $dataItem = $request->validated();

        $data = $this->transactionItemService->update($dataItem, $transactionItem);
        return $this->showOne($data['TransactionItem'], TransactionItemResource::class, $data['message']);

    }


    public function destroy(transactionItem $transactionItem)
    {
        $data = $this->transactionItemService->destroy($transactionItem);
        return [$data['message'], $data['code']];

    }

    public function showDeleted(): JsonResponse
    {   
        $data=$this->transactionItemService->showDeleted();
        return $this->showAll($data['transactionItem'],TransactionItemResource::class,$data['message']); //data key undefined
    }
    public function restore(Request $request){
        
        $data = $this->transactionItemService->restore($request);
        return [$data['message'],$data['code']];
    }
}
