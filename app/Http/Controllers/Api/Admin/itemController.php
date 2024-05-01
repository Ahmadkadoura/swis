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
        $data =[];
        try {
            $data=$this->itemService->index();
            return Response::Success($data['item'],$data['message']);
        }
        catch (Throwable $th){
            $message=$th->getMessage();
            return Response::Error($data,$message);
        }
    }

    public function show(Item $item): JsonResponse
    {
       $data = [];
        try {
            $data = $this->itemService->show($item);
            return Response::Success($data['Item'], $data['message'], $data['code']);
        } catch (Throwable $th) {
            return Response::Error($data, $th->getMessage());
        }
    }
    public function create(storeItemsRequests $request): JsonResponse
    {
        $dataItem=$request->validate();
        $data =[];
        try {
            $data=$this->itemService->create($dataItem);
            return Response::Success($data['Item'],$data['message']);
        }
        catch (Throwable $th){
            $message=$th->getMessage();
            return Response::Error($data,$message);
        }
    }

    public function update(updateItemsRequests $request,Item $item): JsonResponse
    {
        $dataItem=$request->validate();
        $data = [];
        try {
            $data = $this->itemService->update($dataItem, $item);
            return Response::Success($data['Item'], $data['message'], $data['code']);
        } catch (Throwable $th) {
            $message = $th->getMessage();
            return Response::Error($data, $message);
        }
    }


    public function destroy(Item $item): JsonResponse
    {
        $data = [];
        try {
            $data = $this->itemService->destroy($item);
            return Response::Success($data['Item'], $data['message'], $data['code']);
        } catch (Throwable $th) {
            return Response::Error($data, $th->getMessage());
        }
    }

}
