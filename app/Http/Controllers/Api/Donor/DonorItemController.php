<?php

namespace App\Http\Controllers\Api\Donor;

use App\Http\Controllers\Controller;
use App\Http\Repositories\donorItemRepository;
use App\Http\Resources\indexItemForDonerResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DonorItemController extends Controller
{
    private donorItemRepository $donorItemRepository;

    public function __construct(donorItemRepository $donorItemRepository){
        $this->donorItemRepository=$donorItemRepository;
        $this->middleware(['auth:sanctum']);
    }
    public function index(): JsonResponse
    {
        $data = $this->donorItemRepository->indexItemForDonor(Auth::user()->id);
        return $this->showAll($data['donorItem'],indexItemForDonerResource::class,$data['message']);
    }
    public function show($item_id): JsonResponse
    {
        $data = $this->donorItemRepository->showItemForDonor(Auth::user()->id,$item_id);
        return $this->showAll($data['donorItem'],indexItemForDonerResource::class,$data['message']);
    }

}
