<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request){
        $payload =  $request->validate([
            'name' => "required|min:3|max:10",
            'email' => "required|email|unique:users,email",
            'password' => 'required'
        ]);

        try {
            $payload['password'] = Hash::make($payload['password']);
            User::create($payload);

            return response()->json(["message"=>"User registered Successfully"], 200);
        }
        catch(\Exception $err){
            return response()->json(["message"=>"Something Went Wrong"], 500);
        }

    }
}
