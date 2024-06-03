<?php

namespace App\Http\Controllers\Api\keeper;

use App\Http\Controllers\Controller;
use App\Http\Repositories\transactionRepository;
use App\Http\Resources\indexTransactionForKeeperResource;
use App\Http\Resources\showTransactionForKeeperResource;
use App\Http\Resources\TransactionResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class transactionController extends Controller
{
    private transactionRepository $transactionRepository;
     public function __construct(transactionRepository $transactionRepository){
         $this->transactionRepository=$transactionRepository;
         $this->middleware(['auth:sanctum']);
     }
     public function index(): JsonResponse
     {
         $data=$this->transactionRepository->indexTransactionForKeeper(Auth::user()->id);
         return $this->showAll($data['Transaction'],indexTransactionForKeeperResource::class,$data['message']);
     }

    public function show($transaction_id,$warehouse_id): JsonResponse
    {
        $data=$this->transactionRepository->showTransactionForKeeper($transaction_id,$warehouse_id);
        return $this->showOne($data['Item'],showTransactionForKeeperResource::class,$data['message']);

    }
}
