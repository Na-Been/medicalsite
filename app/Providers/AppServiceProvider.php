<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Service;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
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
        Schema::defaultStringLength(191);
        View::composer('home.layouts.app', function ($view) {
            $category = Category::all()->groupBy('category_type');
            $view->with('categories', $category);
        });

        /*View::composer('home.services', function ($view) {
           $services = Service::all();
            $view->with('allServices', $services);
        });*/
    }
}
