<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Driver\StoreDriverRequests;
use App\Http\Requests\Driver\updateDriverRequests;
use App\Http\Resources\DriverResource;
use App\Http\Responses\Response;
use App\Models\Driver;
use App\Services\driverService;
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
        $data =[];
        try {
            $data=$this->driverService->index();
            return Response::Success($data['Driver'],$data['message']);
        }
        catch (Throwable $th){
            $message=$th->getMessage();
            return Response::Error($data,$message);
        }
    }

    public function show(Driver $driver): JsonResponse
    {
        $data = [];
        try {
            $data = $this->driverService->show($driver);
            return Response::Success($data['Driver'], $data['message'], $data['code']);
        } catch (Throwable $th) {
            return Response::Error($data, $th->getMessage());
        }
    }
    public function create(StoreDriverRequests $request): JsonResponse
    {
        $newData=$request->validate();
        $data =[];
        try {
            $data=$this->driverService->create($newData);
            return Response::Success($data['Driver'],$data['message']);
        }
        catch (Throwable $th){
            $message=$th->getMessage();
            return Response::Error($data,$message);
        }
    }

    public function update(updateDriverRequests $request,Driver $driver): JsonResponse
    {
        $newData=$request->validate();
        $data = [];
        try {
            $data = $this->driverService->update($newData, $driver);
            return Response::Success($data['Driver'], $data['message'], $data['code']);
        } catch (Throwable $th) {
            $message = $th->getMessage();
            return Response::Error($data, $message);
        }
    }


    public function destroy(Driver $driver): JsonResponse
    {
        $data = [];
        try {
            $data = $this->driverService->destroy($driver);
            return Response::Success($data['driver'], $data['message'], $data['code']);
        } catch (Throwable $th) {
            return Response::Error($data, $th->getMessage());
        }
    }

}
