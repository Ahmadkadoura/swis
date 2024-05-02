<?php

use App\Http\Controllers\Api\Admin\DriverController;
use App\Http\Controllers\Api\Admin\itemController;
use App\Http\Controllers\Api\Admin\BranchController;
use App\Http\Controllers\Api\Admin\WarehouseController;
use App\Http\Controllers\Auth\AuthController;
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

Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout']);
Route::post('register', [AuthController::class, 'register']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResources([
    'driver'    =>DriverController::class,
    'branch'    => BranchController::class, 
    'warehouse' => WarehouseController::class,
]);
Route::prefix('item')
    ->controller(itemController::class)
    ->group(function (){

        Route::get('/','index')
            ->name('item.index')
            ->middleware('can:item.index');

        Route::get('/{id}','show')
            ->name('item.show')
            ->middleware('can:item.show');

        Route::post('/','create')
            ->name('item.create')
            ->middleware('can:item.create');

        Route::post('/{id}','update')
            ->name('item.update')
            ->middleware('can:item.update');

        Route::delete('/{id}','destroy')
            ->name('item.destroy')
            ->middleware('can:item.destroy');
    });
