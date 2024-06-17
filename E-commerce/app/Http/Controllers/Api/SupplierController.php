<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $suppliers = supplier::get();
        return response()->json([
            "status" => "done",
            "suppliers" => $suppliers
        ]);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $newSupplier = supplier::create([
            "name" => $request->name,
            "address" => $request->address,
            "nationality" => $request->nationality
        ]);
        return response()->json([
            "status" => "done",
            "new supplier" => $newSupplier
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $supplier = supplier::find($id);
        return response()->json([
            "status" => "done",
            "supplier" => $supplier
        ]);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $editedSupplier = supplier::find($id)->update([
            "name" => $request->name,
            "address" => $request->address,
            "nationality" => $request->nationality
        ]);
        return response()->json([
            "status" => "done",
            "edited supplier" => $editedSupplier
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $deletedSupplier = supplier::find($id)->delete();
        return response()->json([
            "status" => "done",
            "deleted supplier" => $deletedSupplier
        ]);
    }
}
