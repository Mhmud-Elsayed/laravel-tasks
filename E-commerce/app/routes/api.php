<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CatogryController;
use App\Http\Controllers\Api\CustomerContrller;
use App\Http\Controllers\Api\OrdersController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\SupplierController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\OrderController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware("auth:sanctum")->group(function(){
    Route::post("logout",[AuthController::class,"logout"]);
    Route::post("createOrder",[OrdersController::class,"create"]);
});
Route::post("register",[AuthController::class,"register"]);
Route::post("login",[AuthController::class,"login"]);

Route::resource("catogry", CatogryController::class);
Route::resource("product", ProductController::class);
// Route::resource("order", OrdersController::class);
Route::resource("supplier", SupplierController::class);
Route::get("/users",[UserController::class,"index"]);
Route::post("/storeUser",[UserController::class,"store"]);
Route::post("/deleteUser/{id}",[UserController::class,"destroy"]);
Route::get("orders",[OrdersController::class,"index"]);
