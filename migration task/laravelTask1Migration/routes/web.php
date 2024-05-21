<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CatogryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplyerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route :: get("/index",[CustomerController::class,"index"]);
Route :: get("/CtogryIndex",[CatogryController::class,"index"]);
Route :: get("/OrdeIindex",[OrderController::class,"index"]);
Route :: get("/CartIndex",[CartController::class,"index"]);
Route :: get("/ProductIndex",[ProductController::class,"index"]);
Route :: get("/SupplyerIndex",[SupplyerController::class,"index"]);
