<?php

namespace App\Providers;
use View;

use Illuminate\Support\ServiceProvider;
use App\User;
use Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

        View::composer('*', function ($view) {
            $view->withAuth(Auth::user());
        });
    }
}
