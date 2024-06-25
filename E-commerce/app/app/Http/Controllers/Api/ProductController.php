<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = product::get();
        return response()->json(["status" => "done", "products" => $products]);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $NewProduct = product::create([
            "name" => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'image' => $request->image,
            'category_id' => $request->category_id

        ]);
        return response()->json(["status" => "done", "NewProduct" => $NewProduct]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $product = product::find($id);
        return response()->json(["status" => "done", "product" => $product]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $editedProduct = product::find($id)->update([
            "name" => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'image' => $request->image,
            'category_id' => $request->category_id
        ]);
        return response()->json(["status" => "done", "editedProduct" => $editedProduct]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $deletedProduct = product::find($id)->delete();
        return response()->json(["status" => "done", "deletedProduct" => $deletedProduct]);
    }
}
