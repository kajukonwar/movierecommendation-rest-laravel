<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth; 
use Validator;

class AuthController extends Controller
{
    
    //register user
    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [

            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',

        ]);


        if ($validator->fails()) {

            $response = ['status' => 'fail', 'data' => ['message' => 'validation error', 'errors' => $validator->errors()]];

            return response()->json($response, 422);
        }

        $user = User::create(['name' => $request->input('name'), 'email' => $request->input('email'), 'password' => bcrypt($request->input('password'))]);

        $response = ['status' => 'success', 'data' => 'User created successfully'];

        return response()->json($response, 201);

    }

    
    /**
     * Find the user instance for the given username.
     *
     * @param  string  $username
     * @return \App\User
     */
    public function findForPassport($username)
    {
        return $this->where('email', $username)->first();
    }
}
