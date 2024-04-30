<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Driver\StoreDriverRequests;
use App\Http\Resources\DriverResource;
use App\Models\Driver;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;


class DriverController extends Controller
{
    public function index(): JsonResponse
    {
        $driver =Driver::paginate(5);
        return DriverResource::collection($driver);
    }

    public function show(Driver $driver): JsonResponse
    {
        return new DriverResource($driver);
    }

    public function store(StoreDriverRequests $request): JsonResponse
    {
        $driver_data = $request->validated();

        $driver = Driver::create($driver_data);
      return $this->showOne($driver, DriverResource::class, __('insert successfully'), 200);

    }

    public function update(StoreDriverRequests $request,Driver $driver): JsonResponse
    {
        $driver_data = $request->validated();

        $driver ->update($driver_data);
        return $this->showOne($driver, DriverResource::class, __('insert successfully'), 200);

    }


    public function destroy(Driver $driver): JsonResponse
    {
        $driver->delete();

        return response(__('deleted successfully'), Response::HTTP_OK);
    }
}
