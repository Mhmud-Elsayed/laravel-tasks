<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginFormRequest;
use App\Http\Requests\RegisterFormRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function register(RegisterFormRequest $request){
        $newUser=User::create([
            "name"=>$request->name,
            "email"=>$request->email,
            "password"=>Hash::make($request->password),
            "phone"=>$request->phone,
            "address"=>$request->address,
            "nationality"=>$request->nationality,
            "gender"=>$request->gender
        ]);
        $tokens=$newUser->createToken("token")->plainTextToken;
        return response()->json([
            "status"=>"done",
            "user"=>$newUser,
            "token"=>$tokens
        ]);

    }
    public function login(LoginFormRequest $request)
    {
        $user=User::where("email",$request->email)->first();
        if(!$user||!Hash::check($request->password,$user->password))
        {
            return response()->json([
                "status"=>"error",
                "message"=>"invalid email or password"
            ]);
        }
        $tokens=$user->makeToken("token")->plainTextToken;
        return response()->json([
            "status"=>"done",
            "user"=>$user,
            "token"=>$tokens
        ]);

    }
    public function logout(Request $request){

        Auth::logout();
        return response()->json([
            "status"=>"done",
            "message"=>"logged out"
        ]);
    }
}
