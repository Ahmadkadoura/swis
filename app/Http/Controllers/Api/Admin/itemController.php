<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Repositories\itemRepository;
use App\Http\Requests\Items\storeItemsRequests;
use App\Http\Requests\Items\updateItemsRequests;
use App\Http\Resources\itemsResource;
use App\Http\Responses\Response;
use App\Models\Item;
use App\Services\itemService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Throwable;

class itemController extends Controller
{
    private itemRepository $itemRepository;
    public function __construct(itemRepository $itemRepository)
    {
        $this->itemRepository = $itemRepository;
        $this->middleware(['auth:sanctum']);
    }
    public function index(): JsonResponse
    {

            $data=$this->itemRepository->index();
        return $this->showAll($data['Item'],itemsResource::class,$data['message']);

    }

    public function show(Item $item): JsonResponse
    {

        return $this->showOne($item,itemsResource::class);

    }
    public function store(storeItemsRequests $request): JsonResponse
    {
        $dataItem=$request->validated();

            $data=$this->itemRepository->create($dataItem);
        return $this->showOne($data['Item'],itemsResource::class,$data['message']);

    }

    public function update(updateItemsRequests $request,Item $item): JsonResponse
    {
        $dataItem=$request->validated();

            $data = $this->itemRepository->update($dataItem, $item);
        return $this->showOne($data['Item'],itemsResource::class,$data['message']);

    }


    public function destroy(Item $item)
    {
            $data = $this->itemRepository->destroy($item);
        return [$data['message'],$data['code']];

    }

    public function showDeleted(): JsonResponse
    {
        $data=$this->itemRepository->showDeleted();
        return $this->showAll($data['Item'],itemsResource::class,$data['message']);
    }
    public function restore(Request $request){

        $data = $this->itemRepository->restore($request);
        return [$data['message'],$data['code']];
    }

}
