<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function index(){

        $Orders=Order :: get();
        return response()->json(["status"=>"success","data"=>$Orders]);
    }
}
