<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            // Check if the user is authenticated with the "admin" guard and has the "admin" role
            if (Auth::guard('admin')->check() && Auth::guard('admin')) {
                // Get the authenticated user
                $user = Auth::guard('admin')->user();
                // Pass the user data to the view
                $view->with('userAuth', $user);
            }
        });
    }
}
