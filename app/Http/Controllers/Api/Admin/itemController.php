<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
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
    private itemService $itemService;
    public function __construct(itemService $itemService)
    {
        $this->itemService = $itemService;
        $this->middleware(['auth:sanctum']);
    }
    public function index(): JsonResponse
    {

            $data=$this->itemService->index();
            return Response::Success($data['Item'],$data['message']);

    }

    public function show(Item $item): JsonResponse
    {

            $data = $this->itemService->show($item);
            return Response::Success($data['Item'], $data['message']);

    }
    public function store(storeItemsRequests $request): JsonResponse
    {
        $dataItem=$request->validated();

            $data=$this->itemService->create($dataItem);
            return Response::Success($data['Item'],$data['message']);

    }

    public function update(updateItemsRequests $request,Item $item): JsonResponse
    {
        $dataItem=$request->validated();

            $data = $this->itemService->update($dataItem, $item);
            return Response::Success($data['Item'], $data['message'], $data['code']);

    }


    public function destroy(Item $item): JsonResponse
    {
            $data = $this->itemService->destroy($item);
            return Response::Success($data['Item'], $data['message'], $data['code']);

    }

}
