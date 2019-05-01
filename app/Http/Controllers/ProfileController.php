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

            'dob' => 'required',
            'gender' => 'required',
            'genre' => 'required',
            'city' => 'required',
            'country' => 'required',
            'state' => 'required',
            'fav_movies' => 'required'
        ]);

         if ($validator->fails()) {

            $response = ['status' => 'fail', 'data' => ['message' => 'validation error', 'errors' => $validator->errors()]];

            return response()->json($response, 422);
        }

        $user_id = Auth::id();
        
        $profile = new Profile();


        //store profile details
        $profile->user_id = $request->user_id;
        $profile->dob = $request->dob;
        $profile->gender = $request->gender;
        $profile->country = $request->country;
        $profile->city = $request->city;
        $profile->state = $request->state;
        $profile->avatar = $request->avatar;
        $profile->save();

        //store user genre
        $user_genre = new Genre();
        $user_genre->genre_id = $request->genre;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
