<?php

use App\Http\Controllers\Api\CatogryController;
use App\Http\Controllers\Api\CustomerContrller;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\SupplierController;
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
Route::resource("customer", CustomerContrller::class);
Route::resource("catogry", CatogryController::class);
Route::resource("product", ProductController::class);
Route::resource("order", OrderController::class);
Route::resource("supplier", SupplierController::class);
