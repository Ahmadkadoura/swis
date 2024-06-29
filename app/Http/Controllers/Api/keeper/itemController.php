<?php

namespace App\Http\Controllers\Api\keeper;

use App\Http\Controllers\Controller;
use App\Http\Repositories\itemRepository;
use App\Http\Resources\ItemInWarehouseResource;
use App\Http\Resources\itemsResource;
use App\Http\Resources\indexKeeperItemResource;
use App\Http\Resources\showKeeperItemResource;
use App\Models\Item;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class itemController extends Controller
{
    private itemRepository $itemRepository;
     public function __construct( itemRepository $itemRepository){
         $this-> itemRepository =$itemRepository;
         $this->middleware(['auth:sanctum']);
     }
    public function index(): JsonResponse
    {
        $data=$this->itemRepository->indexItemForKeeper(Auth::user()->id);
        return $this->showAll($data['Item'],indexKeeperItemResource::class,$data['message']);
    }
    public function show($item_id,$warehouse_id): JsonResponse
    {
        $data=$this->itemRepository->showItemForKeeper($item_id,$warehouse_id);
        return $this->showAll($data['WarehouseItem'],showKeeperItemResource::class,$data['message']);

    }
}
