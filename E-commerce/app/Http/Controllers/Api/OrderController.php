<?php

namespace App\Http\Controllers;

use App\Models\order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $orders = order::get();
        return response()->json([
            "status" => "done",
            "orders" => $orders
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $newOrder = order::create([
            "name" => $request->name,
            "price" => $request->price,
            "discreption" => $request->discreption,
            "customer_id" => $request->customer_id
        ]);
        return response()->json([
            "status" => "done",
            "order" => $newOrder
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order = order::find($id);
        return response()->json([
            "status" => "done",
            "order" => $order
        ]);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $editedOrder = order::find($id)->update([
            "name" => $request->name,
            "price" => $request->price,
            "discreption" => $request->discreption,
            "customer_id" => $request->customer_id
        ]);
        return response()->json([
            "status" => "done",
            "order" => $editedOrder
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deletedorder = order::find($id)->delete();
        return response()->json([
            "status" => "done",
            "order" => $deletedorder
        ]);
    }
}
