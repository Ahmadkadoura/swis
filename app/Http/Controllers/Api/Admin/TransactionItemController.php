<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Repositories\transactionItemRepository;
use App\Http\Requests\Transaction\storeTransactionItemRequest;
use App\Http\Requests\Transaction\UpdateTransactionItemRequest;
use App\Http\Resources\AdminTransactionItemResource;
use App\Models\transactionItem;
use App\Services\TransactionItemService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TransactionItemController extends Controller
{
    private transactionItemRepository $transactionItemRepository;

    public function __construct(transactionItemRepository $transactionItemRepository)
    {
        $this->transactionItemRepository = $transactionItemRepository;
        $this->middleware(['auth:sanctum']);
    }

    public function index(): JsonResponse
    {

        $data = $this->transactionItemRepository->index();
        return $this->showAll($data['TransactionItem'], AdminTransactionItemResource::class, $data['message']);

    }

    public function show(transactionItem $transactionItem): JsonResponse
    {

        return $this->showOne($transactionItem, AdminTransactionItemResource::class);

    }

    public function store(storeTransactionItemRequest $request): JsonResponse
    {
        $dataItem = $request->validated();

        $data = $this->transactionItemRepository->create($dataItem);
        return $this->showOne($data['TransactionItem'], AdminTransactionItemResource::class, $data['message']);

    }

    public function update(UpdateTransactionItemRequest $request,transactionItem $transactionItem): JsonResponse
    {
        $dataItem = $request->validated();

        $data = $this->transactionItemRepository->update($dataItem, $transactionItem);
        return $this->showOne($data['TransactionItem'], AdminTransactionItemResource::class, $data['message']);

    }


    public function destroy(transactionItem $transactionItem)
    {
        $data = $this->transactionItemRepository->destroy($transactionItem);
        return [$data['message'], $data['code']];

    }

    public function showDeleted(): JsonResponse
    {
        $data=$this->transactionItemRepository->showDeleted();
        return $this->showAll($data['transactionItem'],AdminTransactionItemResource::class,$data['message']); //data key undefined
    }
    public function restore(Request $request){

        $data = $this->transactionItemRepository->restore($request);
        return [$data['message'],$data['code']];
    }
}
