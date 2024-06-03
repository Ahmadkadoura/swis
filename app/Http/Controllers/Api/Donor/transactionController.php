<?php

namespace App\Http\Controllers\Api\Donor;

use App\Http\Controllers\Controller;
use App\Http\Repositories\transactionRepository;
use App\Http\Resources\DonorTransactionResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class transactionController extends Controller
{
    private transactionRepository $transactionRepository;
    public function __construct(transactionRepository $transactionRepository){
        $this->transactionRepository=$transactionRepository;
        $this->middleware(['auth:sanctum']);
    }
    public function index()
    {
        $data = $this->transactionRepository->indexTransactionForDonor(Auth::user()->id);
        return $this->showAll($data['Transaction'],DonorTransactionResource::class,$data['message']);
    }
    public function show($transaction_id)
    {
        $data = $this->transactionRepository->showTransactionForDonor(Auth::user()->id,$transaction_id);
        return $this->showAll($data['Transaction'],DonorTransactionResource::class,$data['message']);
    }

}
