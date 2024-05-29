<?php

namespace App\Http\Controllers\Api\keeper;

use App\Http\Controllers\Controller;
use App\Http\Repositories\warehouseRepository;
use App\Http\Resources\showKeeperItemResource;
use App\Http\Resources\WarehouseResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WarehouseController extends Controller
{
    private warehouseRepository $warehouseRepository;

    public function __construct(warehouseRepository $warehouseRepository)
    {
        $this->warehouseRepository=$warehouseRepository;
        $this->middleware(['auth:sanctum']);
    }
    public function show()
    {
        $data = $this->warehouseRepository->showWarehouseForKeeper(Auth::user()->id);
        return $this->showAll($data['Warehouse'],WarehouseResource::class,$data['message']);
    }
}
