<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use Illuminate\Support\Facades\View;
use Cart;


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
        // View::share('categories', Category::with('children')->whereNull('parent')->get());
         
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
     
        view()->share('carttotal', Cart::instance('shopping')->count());
        view()->share('cartamount', Cart::instance('shopping')->count());
    }
}