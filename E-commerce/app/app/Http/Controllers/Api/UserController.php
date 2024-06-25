<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index(Request $request)
    {
        $users = User::get();
        return response()->json(["status" => "done", "users" => $users]);
    }
    public function store(UserRequest $request)
    {
        $newUser = User::create([

            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' => $request->password,
            "nationality" => $request->nationality,
            "gender" => $request->gender

        ]);
        return response()->json(["status" => "done", "user" => $newUser]);
    }
    public function destroy( string $id){
        $deletedUser=User::find($id)->delete();
        if($deletedUser){
            return response()->json(["status" => "done", "deletedUser" => $deletedUser]);
        }
    }
}
