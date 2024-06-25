<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\catogry;
use Illuminate\Http\Request;

class CatogryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $catogry=catogry::get();
        return response()->json(["status"=>"done", "catogry"=>$catogry]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $newCatogry=catogry::create([
            "name"=>$request->name,
            "discreption"=>$request->discreption
        ]);
        return response()->json(["status"=>"done", "newCatogry"=>$newCatogry]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $catogry=catogry::find($id);
        return response()->json(["status"=>"done", "catogry"=>$catogry]);
    }

   

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $editedCatogry=catogry::find($id)->update([
            "name"=>$request->name,
            "discreption"=>$request->discreption
        ]);
        return response()->json(["status"=>"done", "editedcaatogry"=>$editedCatogry]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return catogry::find($id)->delete();
    }
}
