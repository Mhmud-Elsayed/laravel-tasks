<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    public function index(){

        $Carts=Cart :: get();
        return response()->json(["status"=>"success","data"=>$Carts]);
    }
}
