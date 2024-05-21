<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CatogryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplyerController;
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
Route :: post("/index",[CustomerController::class,"index"]);
Route :: post("/CartIndex",[CartController::class,"index"]);
Route :: post("/CtogryIndex",[CatogryController::class,"index"]);
Route :: post("/OrdeIindex",[OrderController::class,"index"]);
Route :: post("/ProductIndex",[ProductController::class,"index"]);
Route :: post("/SupplyerIndex",[SupplyerController::class,"index"]);
