<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Items\storeItemsRequests;
use App\Http\Requests\Items\updateItemsRequests;
use App\Http\Resources\itemsResource;
use App\Http\Responses\Response;
use App\Models\Item;
use App\Services\itemService;
use App\Services\UserServices;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

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

    public function show($id): JsonResponse
    {
       $data = [];
        try {
            $data = $this->itemService->show($id);
            return Response::Success($data['item'], $data['message'], $data['code']);
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
            return Response::Success($data['item'],$data['message']);
        }
        catch (Throwable $th){
            $message=$th->getMessage();
            return Response::Error($data,$message);
        }
    }

    public function update(updateItemsRequests $request,$id): JsonResponse
    {
        $dataItem=$request->validate();
        $data = [];
        try {
            $data = $this->itemService->update($dataItem, $id);
            return Response::Success($data['item'], $data['message'], $data['code']);
        } catch (Throwable $th) {
            $message = $th->getMessage();
            return Response::Error($data, $message);
        }
    }


    public function destroy($id): JsonResponse
    {
        $data = [];
        try {
            $data = $this->itemService->destroy($id);
            return Response::Success($data['item'], $data['message'], $data['code']);
        } catch (Throwable $th) {
            return Response::Error($data, $th->getMessage());
        }
    }

}
