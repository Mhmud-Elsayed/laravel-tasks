<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\userResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with("tasks")->get();
        $users=userResource::collection($users);
        return response()->json(["status" => "done", "users" => $users]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $newUser = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => $request->password
        ]);
        return response()->json(["status" => "done", "user" => $newUser]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $users = User::with("tasks")->find($id);
        return response()->json(["status" => "done", "users" => $users]);
    }




    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $editedUser = User::find($id)->update([
            "name" => $request->name,
            "email" => $request->email,
            "password" => $request->password
        ]);
        return response()->json(["status" => "done", "user" => $editedUser]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $DeletedUser = User::find($id)->delete();
        return response()->json(["status" => "done", "user" => $DeletedUser]);
    }
}
