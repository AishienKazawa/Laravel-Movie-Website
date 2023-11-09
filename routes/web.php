<?php

use App\Http\Controllers\MovieController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserDataController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// routes that don't require user authenticated
Route::middleware('guest')->group(function () {
    // index page
    Route::get('/', function () {
        return view('index');
    })->name("login")->middleware('guest');

    // goto login page
    Route::get('/login', function () {
        return view('account.signin.index');
    })->name("signin.index")->middleware('guest');

    // goto membership confirmation credentials page
    Route::get('/signup/confirm-password', function () {
        return view('account.membership.confirm-password');
    })->name("membership.confirm-password");

    // goto set-up password page 
    Route::get('/signup/set-password', function () {
        return view('account.signup.set-password');
    })->name("signup.set-password");

    // goto set-up password page 
    Route::get('/netflix/error', function () {
        return view('error');
    })->name("error");
});

// routes that require user authentication
Route::middleware(["auth"])->group(function () {
    // goto membership plan instruction page
    Route::get('/signup/membership-plan', function () {
        return view('account.membership.membership-plan');
    })->name("membership.membership-plan");

    // goto picking membership level page
    Route::get('/signup/membership-plan/planform', function () {
        return view('account.membership.membership-level');
    })->name("membership.planform");

    // goto payment method page
    Route::get('/signup/payment-method', function () {
        return view('account.membership.payment-method');
    })->name("membership.payment-method");

    // goto credit payment form
    Route::get('/signup/payment-method/credit-option', function () {
        return view('account.membership.payment-credit');
    })->name("payment-method.credit-option");

    // goto wallet payment form
    Route::get('/signup/payment-method/wallet-option', function () {
        return view('account.membership.payment-wallet');
    })->name("payment-method.wallet-option");
});

// routes that require admin authentication
Route::middleware(["auth:admin"])->group(function () {
    // goto homepage
    Route::get('/netflix/homepage', [MovieController::class, "homepage"])->name("netflix.homepage");

    // goto movies page
    Route::get('/netflix/movies', [MovieController::class, "movies"])->name("netflix.movies");

    // goto specific movie
    Route::get('/netflix/movies/movie/{id}', [MovieController::class, "movieDetails"])->name("movies-details");

    // goto user watch list
    Route::get('/netflix/user/watch-list', [UserDataController::class, "watchList"])->name("netflix.watch-list");

    // goto user profile
    Route::get('/netflix/user/profile', [UserDataController::class, "userProfile"])->name("netflix.user-profile");

    // logout user account
    Route::put("/netflix/user/profile/update", [UserDataController::class, "userUpdate"])->name("admin.update-profile");

    // delete user account
    Route::post("/netflix/user/profile/delete", [UserDataController::class, "userDelete"])->name("admin.delete-profile");

    // search a movie
    Route::post("/netflix/movies/search", [MovieController::class, "searchMovie"])->name("search-movie");

    // add a movie to watch list
    Route::post("/netflix/movies/movie/add-to-list", [UserDataController::class, "addToList"])->name("netflix.add-to-list");

    // delete a movie to watch list
    Route::post("/netflix/movies/movie/delete", [UserDataController::class, "deleteMovie"])->name("netflix.delete-movie");

    // logout user account
    Route::post("/netflix/logout", [UserDataController::class, "adminLogout"])->name("admin.logout");
});


// verify email if existed or not
Route::post("/signup/verify-email", [UserController::class, "verifyEmail"])->name("signup.verify-email");

// verify pending account
Route::post("/signup/pending-account", [UserController::class, "pendingAccount"])->name("signup.pending-account");

// create password for user account
Route::post("/signup/create-password", [UserController::class, "createPassword"])->name("signup.create-password");

// selecting membership plan
Route::post("/signup/membership-plan/planform/select-plan", [UserController::class, "selectPlan"])->name("membership.select-plan");

// valitdation for credit information
Route::post("/signup/payment-method/credit-option/payment-validation", [UserController::class, "creditValidation"])->name("credit-validation");

// valitdation for wallet information
Route::post("/signup/payment-method/wallet-option/payment-validation", [UserController::class, "walletValidation"])->name("wallet-validation");

// valitdation for existense of user account
Route::post("/signin", [UserController::class, "accountValidation"])->name("signin.account-validation");

// logout user account
Route::post("/logout", [UserController::class, "logout"])->name("logout");
