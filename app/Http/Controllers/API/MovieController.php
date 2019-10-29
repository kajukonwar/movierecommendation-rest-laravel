<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Movie;
use App\Http\Resources\MovieCollection as MovieCollection;
use App\Http\Resources\Movie as MovieResource;
use Illuminate\Support\Facades\DB;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $movies = Movie::all();

        return new MovieCollection($movies);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $movie = Movie::find($id);
        
        return new MovieResource($movie);
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




    public function getMostRated(Request $request)
    {

        $top_rated_movies = DB::table('user_ratings')
                           ->select('movie_id', DB::raw('COUNT(rating) as rating_count'))
                           ->groupBy('movie_id')
                           ->orderBy('rating_count', 'desc')
                           ->limit(10);
        $movies = DB::table('movies')
                ->joinSub($top_rated_movies, 'top_rated_movies', function ($join) {
                    $join->on('movies.movielens_id', '=', 'top_rated_movies.movie_id');
                })->get();

        return response()->json(['data' => $movies]);
    }


    public function getTopRated(Request $request)
    {
        $most_rated_movies = DB::table('user_ratings')
                           ->select('movie_id', DB::raw('ROUND(AVG(rating),1) as avg_rating'))
                           ->groupBy('movie_id')
                           ->orderBy('avg_rating', 'desc')
                           ->limit(10);
                           
        $movies = DB::table('movies')
                ->joinSub($most_rated_movies, 'most_rated_movies', function ($join) {
                    $join->on('movies.movielens_id', '=', 'most_rated_movies.movie_id');
                })->get();

        return response()->json(['data' => $movies]);
    }
}
