<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use Tymon\JWTAuth\Exceptions\JWTException;
use JWTAuth;

class AuthController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "name" => "required|string",
            "email" => "required|email",
            "password" => "required|min:12"
        ]);

        $name = $request->input("name");
        $email = $request->input("email");
        $password = $request->input("password");

        $user = new User([
            "name" => $name,
            "email" => $email,
            "password" => bcrypt($password)
        ]);

        if($user->save()) {
            $user->signin = [
                "href" => "api/v1/user/sigin",
                "method" => "POST",
                "params" => "email, password"
            ];
            $response = [
                "msg" => "User was created",
                "user" => $user 
            ];
    
            return response()->json($response, 201);
        }

        $response = ["msg" => "An error occurred while creating the user"];

        return response()->json($response, 403);
    }

    public function signIn(Request $request) 
    {
        $this->validate($request, [
            "email" => "required|email",
            "password" => "required"
        ]); 

        $credentials = $request->only("email", "password");

        try{
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(["msg" => "Invalid credentials"], 403);
            }
        } catch (JWTException $e) {
            return response()->json(["msg" => "Could not create token"], 500);
        }

        return response()->json(["token" => $token]);
    }
}
