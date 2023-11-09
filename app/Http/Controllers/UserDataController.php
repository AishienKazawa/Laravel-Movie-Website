<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\watchList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserDataController extends Controller
{
    // fetch the movies related to the user
    public function watchList()
    {
        $userId = $user = Auth::user()->id;

        $movies = watchList::where('user_id', $userId)->get();

        return view('authenticated.watch-list', compact('movies'));
    }

    // add movie to the watch-list
    public function addToList(Request $request)
    {
        $userId = $user = Auth::user()->id;

        $movieId = $request->input('movieID');

        $allMovies = json_decode(Storage::get('data.json'), true);

        if (isset($allMovies['movies']['all'])) {
            $movies = $allMovies['movies']['all'];

            $foundMovie = null;
            foreach ($movies as $movie) {
                if ($movie['id'] == $movieId) {
                    $foundMovie = $movie;
                    break;
                }
            }

            if ($foundMovie) {
                if (
                    watchList::where('user_id', $userId)
                    ->where('movie_id', $movieId)
                    ->exists()
                ) {
                    return redirect()
                        ->route('movies-details', $foundMovie['id'])
                        ->with('message', 'Movie already exists in the watch list');
                }

                $newMovie = new watchList();
                $newMovie->user_id = $userId;
                $newMovie->movie_id = $foundMovie['id'];
                $newMovie->title = $foundMovie['title'];
                $newMovie->director = $foundMovie['director'];
                $newMovie->genre = $foundMovie['genre'];
                $newMovie->release_year = $foundMovie['release_year'];
                $newMovie->cast = $foundMovie['cast'];
                $newMovie->duration = $foundMovie['duration'];
                $newMovie->ratings = $foundMovie['ratings'];
                $newMovie->imdb = $foundMovie['imdb'];
                $newMovie->fr = $foundMovie['fr'];
                $newMovie->country = $foundMovie['country'];
                $newMovie->plot = $foundMovie['plot'];
                $newMovie->image = $foundMovie['image'];
                $newMovie->cover = $foundMovie['cover'];
                $newMovie->screenshots = json_encode($foundMovie['screenshots']);

                $newMovie->save();
                return redirect()->route('movies-details', $foundMovie['id']);
            } else {
                //return response()->json(['error' => 'Movie not found in the JSON data'], 404);
            }
        } else {
            //return response()->json(['error' => 'Invalid JSON data format'], 500);
        }
    }

    // delete a movie in watch-list
    public function deleteMovie(Request $request)
    {
        $movieID = $request->input('movieID');

        $movie = WatchList::find($movieID);

        if ($movie) {
            $movie->delete();

            return redirect()->route('netflix.watch-list');
        } else {
            return response()->json(['error' => 'Movie not found'], 404);
        }
    }

    // fetch user data
    public function userProfile(Request $request)
    {
        $user = Auth::user();
        return view('authenticated.user-profile', compact('user'));
    }

    // delete user profile
    public function userDelete(Request $request)
    {
        $userId = $request->input('userId');

        $user = User::find($userId);

        if ($user) {
            $user->delete();
            $this->adminLogout();

            return redirect()->route('login');
        } else {
            return response()->json(['error' => 'Movie not found'], 404);
        }
    }

    // update user information
    public function userUpdate(Request $request)
    {
        $user = Auth::guard('admin')->user();
        $request->validate(
            [
                'email' => ['required', 'email'],
                'password' => ['nullable', 'min:8', "regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&_])[A-Za-z\d@$!%*?&_]+$/"],
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ],
            [
                'password.regex' => 'The password must contain at least one lowercase letter, one uppercase letter, one digit, and one special character.',
            ],
        );

        $user->email = $request->input('email');

        if ($request->filled('password')) {
            $user->password = bcrypt($request->input('password'));
        }

        if ($request->hasFile('image')) {
            if ($user->image) {
                Storage::disk('public')->delete($user->image);
            }

            $image_path = $request->file('image')->store('images/users', 'public');
            $user->image = $image_path;
        }

        $user->save();

        return redirect()->route('netflix.user-profile');
    }

    // logout
    public function adminLogout()
    {
        Auth::guard('admin')->logout();
        session()->flush();
        return redirect()->route('login');
    }
}
