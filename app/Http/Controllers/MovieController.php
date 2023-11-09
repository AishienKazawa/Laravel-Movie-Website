<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\watchList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{

    // fetch all movies related to the homepage
    public function homepage()
    {
        $user = Auth::user();

        $movieData = json_decode(Storage::get('data.json'), true);

        if (isset($movieData['movies']['all'])) {
            $hero = $movieData['movies']['hero'];
            $movies = $movieData['movies']['all'];
        } else {
            $movies = [];
        }

        return view("authenticated.homepage", compact("movies", "hero"));
    }

    // fetch all movies
    public function movies()
    {
        $movieData = json_decode(Storage::get('data.json'), true);

        if (isset($movieData['movies']['all'])) {
            $movies = $movieData['movies']['all'];
        } else {
            $movies = [];
        }

        return view("authenticated.movies", compact("movies"));
    }

    // fetch data based on the specifi movie
    public function movieDetails($movie_id)
    {
        $movieData = json_decode(Storage::get('data.json'), true);

        $movieDetails = null;

        foreach ($movieData['movies']['all'] as $item) {
            if ($item['id'] == $movie_id) {
                $movieDetails = $item;
                break;
            }
        }

        $movieExisted = watchList::where('user_id', auth()->user()->id)->where('movie_id', $movieDetails["id"])->exists();

        if (!$movieDetails) {
            abort(404);
        }

        return view("authenticated.movie-details", compact("movieDetails", "movieExisted"));
    }

    // fetch a movie/s related to the query
    public function searchMovie(Request $request)
    {
        $query = $request->input("search");
        $movieData = json_decode(Storage::get('data.json'), true);

        $movies = array_filter($movieData['movies']['all'], function ($movie) use ($query) {
            return stripos($movie['title'], $query) !== false;
        });

        if ($query) {
            if (count($movies) > 1) {
                return view('authenticated.movies', compact('movies'));
            } elseif (count($movies) === 1) {
                $movieId = reset($movies)['id'];
                return redirect()->route('movies-details', ['id' => $movieId]);
            } else {
                return view("authenticated.movies", compact("movies"));
            }
        } else {
            return view("authenticated.movies", compact("movies"));
        }
    }
}
