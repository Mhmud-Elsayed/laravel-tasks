<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrederRequest;
use App\Models\order;
use App\Models\Order_Item;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function create(OrederRequest $request){
        $totalamount=0;
        $newOrder=order::create([
            "name"=>$request->name,
            "totalamount"=>$totalamount,
            "comments"=>$request->comments,
            "user_id"=>$request->user_id
        ]);
        
        $orderItems=Order_Item::create([
            "product_id"=>$request->product_id,
            "quantity"=>$request->quantity,
            "order_id"=>$newOrder->id,
            "price"=>$request->price,
            "subtotal"=>(($request->quantity)*($request->price))
        ]);
        $totalamount+=$orderItems->subtotal;
        $newOrder->totalamount=$totalamount;
        $newOrder->save();
        return response()->json([
            "status"=>"done",
            "order"=>$newOrder,
            "orderItems"=>$orderItems
        ]);
    }
}
