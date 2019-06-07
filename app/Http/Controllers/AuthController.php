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

            'email' => 'required|unique:users',
            'password' => 'required',

        ]);


        if ($validator->fails()) {

            $response = ['status' => 'fail', 'data' => ['message' => 'validation error', 'errors' => $validator->errors()]];

            return response()->json($response, 422);
        }

        $user = User::create(['email' => $request->input('email'), 'password' => bcrypt($request->input('password'))]);

        $response = ['status' => 'success', 'data' => 'User created successfully'];

        return response()->json($response, 201);

    }



    public function login(Request $request)
    {

        
        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) { 

            $user = Auth::user(); 

            $response['token'] =  $user->createToken('MyApp')->accessToken; 

            $response = ['status' => 'success', 'data' => $response];

            return response()->json($response, 200); 
        
        } else { 

            return response()->json(['status'=>'fail'], 401); 
            
        } 
      
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
