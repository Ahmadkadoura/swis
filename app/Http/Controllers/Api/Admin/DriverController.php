<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Driver\StoreDriverRequests;
use App\Http\Requests\Driver\updateDriverRequests;
use App\Http\Resources\DriverResource;
use App\Http\Responses\Response;
use App\Models\Driver;
use App\Services\driverService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Throwable;


class DriverController extends Controller
{
    private driverService $driverService;
    public function __construct(driverService $driverService)
    {
        $this->driverService = $driverService;
        $this->middleware(['auth:sanctum']);
    }
    public function index(): JsonResponse
    {

            $data=$this->driverService->index();
        return $this->showAll($data['Driver'],DriverResource::class,$data['message']);

    }

    public function show(Driver $driver): JsonResponse
    {

        return $this->showOne($driver,DriverResource::class);

    }
    public function store(StoreDriverRequests $request): JsonResponse
    {
        $newData=$request->validated();

            $data=$this->driverService->create($newData);
        return $this->showOne($data['Driver'],DriverResource::class,$data['message']);
    }

    public function update(updateDriverRequests $request,Driver $driver): JsonResponse
    {
        $newData=$request->validated();
        $data = $this->driverService->update($newData, $driver);
        return $this->showOne($data['Driver'],DriverResource::class,$data['message']);

    }


    public function destroy(Driver $driver)
    {

            $data = $this->driverService->destroy($driver);
            return [ $data['message'], $data['code']];

    }

    public function showDeleted(): JsonResponse
    {
        $data=$this->driverService->showDeleted();
        return $this->showAll($data['Driver'],DriverResource::class,$data['message']);
    }

    public function restore(Request $request){
        
        $data = $this->driverService->restore($request);
        return [$data['message'],$data['code']];
    }

}
