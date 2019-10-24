<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Carbon\Carbon;


Route::get('/', function () {

    
    return view('welcome');

    /*
	//add movie data from omdb
    $movies = DB::table('movies')->where('created_at', '=', NULL)->take(400)->get();

    //$movies = DB::table('movies')->where('movielens_id', '>', 1609)->take(100)->get();

    $count = 0;

    foreach($movies as $s_movie) {

    	$movie = substr(trim($s_movie->title), 0, -6);

    	//send api request 
    	$url = 'http://www.omdbapi.com/?apikey=cd7cdcea&t='.$movie.'&plot=full&r=json';

    	$client = new Client(); 

    	$result = $client->get($url);

    	$api_data = json_decode($result->getBody()->getContents());


    	if ($api_data->Response == "True") {

    		//insert the details into database
		    DB::table('movies')->where('movielens_id', $s_movie->movielens_id)->update(

		    	[
		    		'release_year' => !empty($api_data->Year)? $api_data->Year: 'NULL',
		    		'rated' => !empty($api_data->Rated)? $api_data->Rated: 'NULL',
		    		'release_date' => !empty($api_data->Released) ? $api_data->Released: 'NULL',
		    		'runtime' => !empty($api_data->Runtime) ? $api_data->Runtime: 'NULL',
		    		'director' => !empty($api_data->Director) ? $api_data->Director : 'NULL',
		    		'actors' => !empty($api_data->Actors) ? $api_data->Actors : 'NULL',
		    		'languages' => !empty($api_data->Language) ? $api_data->Language : 'NULL',
		    		'countries' => !empty($api_data->Country) ? $api_data->Country: 'NULL',
		    		'poster' => !empty($api_data->Poster) ? $api_data->Poster: 'NULL',
		    		'awards' => !empty($api_data->Awards) ? $api_data->Awards:'NULL',
		    		'imdb_rating' => !empty($api_data->Ratings[0]->Value)? $api_data->Ratings[0]->Value: 'NULL',
		    		'rotten_tomatoes_rating' => !empty($api_data->Ratings[1]->Value) ? $api_data->Ratings[1]->Value:'NULL',
		    		'metacritic_rating' => !empty($api_data->Ratings[2]->Value) ? $api_data->Ratings[2]->Value: 'NULL',
		    		'imdb_votes' => !empty($api_data->imdbVotes) ? $api_data->imdbVotes: 'NULL',
		    		'imdb_id' => !empty($api_data->imdbID) ? $api_data->imdbID: 'NULL',
		    		'dvd_release_date' => !empty($api_data->DVD) ? $api_data->DVD:'NULL',
		    		'production' => !empty($api_data->Production) ? $api_data->Production: 'NULL',
		    		'website' => !empty($api_data->Website) ? $api_data->Website: 'NULL',
		    		'created_at' => Carbon::now(),
		    		'omdb_genres' => !empty($api_data->Genre) ? $api_data->Genre: 'NULL',
		    		'plot' => !empty($api_data->Plot) ? $api_data->Plot: 'NULL'
		    	]

		    );

            $count++;

    	}
    	

    }

    echo $count.' rows are updated';

    */


    // add movies genres 
    
    /*
    $movies = DB::table('movies')->select('id', 'omdb_genres')->where('created_at', '<>', NULL)->get();

    foreach($movies as $movie) {

    	$genres = $movie->omdb_genres;

    	$genres = explode(',',$genres);

    	foreach($genres as $genre) {

    		$genre = trim($genre);

    		$genre_id = DB::table('genres')->where('name', $genre)->value('id');

    		if (!empty($genre_id)) {

    			DB::table('movie_genres')->insert(

    				['movie_id' => $movie->id, 'genre_id' => $genre_id],
	    		);
    		}
    	}
    }

    */
    

});
