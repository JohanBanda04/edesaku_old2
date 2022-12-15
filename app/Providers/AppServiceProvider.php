<?php

namespace App\Providers;
use Illuminate\Support\Facades\Blade;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::if('role', function ($roles) {
            if (auth()->user()){
                if (is_array($roles)){
                    return in_array(auth()->user()->role->name, $roles);
                } else {
                    return auth()->user()->role->name === $roles;
                }
            };
        });
    }
}
