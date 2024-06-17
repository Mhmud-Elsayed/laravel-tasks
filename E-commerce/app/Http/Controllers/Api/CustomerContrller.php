<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\customer;
use Illuminate\Http\Request;

class CustomerContrller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $customers=customer::get();
        return response()->json(["status" => "done", "customers" => $customers]);
    }

   

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $newCustomer=customer::create([
            "name"=>$request->name,
            "address"=>$request->address,
            "nationality"=>$request->nationality
        ]);
        return response()->json(["status"=>"done","newCustomer" => $newCustomer]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $customer=customer::find($id);
        return response()->json(["status" => "done", "customer" => $customer]);
    }

    /**
     * Show the form for editing the specified resource.
     */
   

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $editedcustomer=customer::find($id)->update([
            "name"=>$request->name,
            "address"=>$request->address,
            "nationality"=>$request->nationality

        ]);
        return response()->json(["status" => "done", "editedcustomer" => $editedcustomer]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deletedcutomer=customer::find($id)->delete();
        if($deletedcutomer){
            return response()->json(["status" => "done", "deletedcutomer" => $deletedcutomer]);
        }
        else{
            return response()->json(["status" => "error", "deletedcutomer" =>"id not found"]);
        }
    }
}
