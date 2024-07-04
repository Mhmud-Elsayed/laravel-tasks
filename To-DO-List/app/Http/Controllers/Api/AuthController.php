<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthLoginForm;
use App\Http\Requests\AuthRegisterForm;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    //
    public function Register(AuthRegisterForm $request)
    {
        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password)
        ]);
        $token = $user->createToken("token")->plainTextToken;
        return response()->json([
            "user" => $user,
            "token" => $token
        ]);
    }
    public function login(AuthLoginForm $request)
    {
        $user = User::where("email", $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                "status" => "error",
                "message" => "invalid email or password"
            ], 401);
        }
        $token = $user->createToken("token")->plainTextToken;
        return response()->json([
            "user" => $user,
            "token" => $token
        ]);
    }

    public function logout(Request $request)
    {


        auth()->user()->tokens()->delete();
        Auth::logout();
        return response()->json([
            "status" => "done",
            "message" => "logged out"
        ]);
    }
}
