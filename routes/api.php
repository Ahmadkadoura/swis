<?php

use App\Http\Controllers\Api\Admin\DonorController;
use App\Http\Controllers\Api\Admin\DriverController;
use App\Http\Controllers\Api\Admin\itemController;
use App\Http\Controllers\Api\Admin\BranchController;
use App\Http\Controllers\Api\Admin\WarehouseItemController;
use App\Http\Controllers\Api\Admin\TransactionController;
use App\Http\Controllers\Api\Admin\TransactionItemController;
use App\Http\Controllers\Api\Admin\TransactionWarehouseController;
use App\Http\Controllers\Api\Admin\UserController;
use App\Http\Controllers\Api\Admin\WarehouseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

require_once __DIR__ . '/Api/Auth.php';

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(BranchController::class)->group(function(){
    Route::post('branches/restore','restore');
    Route::get('branches/showDeleted','showDeleted');
});

Route::controller(DriverController::class)->group(function(){
    Route::post('drivers/restore','restore');
    Route::get('drivers/showDeleted','showDeleted');
});

Route::controller(DonorController::class)->group(function(){
    Route::post('donors/restore','restore');
    Route::get('donors/showDeleted','showDeleted');
});

Route::controller(itemController::class)->group(function(){
    Route::post('items/restore','restore');
    Route::get('items/showDeleted','showDeleted');
});

Route::controller(WarehouseController::class)->group(function(){
    Route::post('warehouses/restore','restore');
    Route::get('warehouses/showDeleted','showDeleted');
});

Route::controller(TransactionController::class)->group(function(){
    Route::post('transactions/restore','restore');
    Route::get('transactions/showDeleted','showDeleted');
});

Route::controller(UserController::class)->group(function(){
    Route::post('users/restore','restore');
    Route::get('users/showDeleted','showDeleted');
});

Route::controller(WarehouseItemController::class)->group(function(){
    Route::post('warehouseItems/restore','restore');
    Route::get('warehouseItems/showDeleted','showDeleted');
});

Route::controller(TransactionItemController::class)->group(function(){
    Route::post('transactionItems/restore','restore');
    Route::get('transactionItems/showDeleted','showDeleted');
});

Route::controller(TransactionWarehouseController::class)->group(function(){
    Route::post('transactionWarehouses/restore','restore');
    Route::get('transactionWarehouses/showDeleted','showDeleted');
});

Route::apiResources([
    'drivers'               => DriverController::class,
    'branches'              => BranchController::class,
    'warehouses'            => WarehouseController::class,
    'users'                 => UserController::class,
    'donors'                => DonorController::class,
    'items'                 => itemController::class,
    'warehouseItems'        => WarehouseItemController::class,
    'transactions'          => TransactionController::class,
    'transactionItems'      => TransactionItemController::class,
    'transactionWarehouses' => TransactionWarehouseController::class,
]);


//Route::prefix('item')
//    ->controller(itemController::class)
//    ->group(function (){
//
//        Route::get('/','index')
//            ->name('item.index')
//            ->middleware('can:item.index');
//
//        Route::get('/{id}','show')
//            ->name('item.show')
//            ->middleware('can:item.show');
//
//        Route::post('/','create')
//            ->name('item.create')
//            ->middleware('can:item.create');
//
//        Route::post('/{id}','update')
//            ->name('item.update')
//            ->middleware('can:item.update');
//
//        Route::delete('/{id}','destroy')
//            ->name('item.destroy')
//            ->middleware('can:item.destroy');
//    });
