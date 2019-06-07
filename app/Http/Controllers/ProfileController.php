<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Profile;
use App\Genre;
use Validator;
use Carbon\Carbon;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {    

        
         

        

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [

            'dob' => 'required|date_format:Y-m-d',
            'country' => 'required',
        ]);

         if ($validator->fails()) {

            $response = ['status' => 'fail', 'data' => ['message' => 'validation error', 'errors' => $validator->errors()]];

            return response()->json($response, 422);
        }

        $user_id = Auth::id();
        $profile = new Profile();


        //store profile details
        $profile->user_id = $user_id;
        $profile->dob = $request->dob;
        $profile->country = $request->country;
        
        if ($profile->save()) {

            $response = ['status' => 'success'];

        } else {

            $response = ['status' => 'fail'];

        }

        return response()->json($response, 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {

            $profile = Profile::findOrFail($id);

            $response = ['status' => 'success', 'data' => ['profile' => $profile]];

            return response()->json($response, 200);

        } catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e) {


            $response = ['status' => 'error', 'message' => 'No profile found'];

            return response()->json($response, 200);
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $validator = Validator::make($request->all(), [

            'dob' => 'required|date_format:Y-m-d',
            'country' => 'required',
        ]);


        if ($validator->fails()) {

            $response = ['status' => 'fail', 'data' => ['message' => 'validation error', 'errors' => $validator->errors()]];

            return response()->json($response, 422);
        }

        
        $user_id = Auth::id();
        $profile = Profile::find($id);

        $profile->fill($request->toArray());

        $profile->save();
        
        return response()->json($profile, 200);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        Profile::destroy($id);
        $response = ['status' => 'success', 'data' => NULL];
        return response()->json($response, 200);
    }
}
