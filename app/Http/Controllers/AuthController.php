<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;


class AuthController extends Controller
{
    public function register(Request $request) {
        
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'email|required|unique:users',
            'password' => 'required|confirmed',
            'roll_number' => 'required|digits:9|unique:users',
            'github_handle'=> 'max:255'
        ]);

        $validatedData['password'] = bcrypt($request->password);
        User::create($validatedData);

        return response()->json(['message' => 'Registration Successful'], 200);
    }

    public function login(Request $request) {

        $loginData = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

        if (!auth()->attempt($loginData)) {
            return response()->json(['message' => 'Invalid Credentials'], 401);
        }

        $accessToken = auth()->user()->createToken('authToken')->accessToken;

        return response(['message' => 'Login Successful', 'user' => auth()->user(), 'access_token' => $accessToken]);
        
    }
}
