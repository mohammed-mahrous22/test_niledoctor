<?php

namespace App\Providers;

use App\View\Components\Container;
use App\View\Components\textarea;
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
        Blade::component('text-area', textarea::class);
        Blade::component('container', Container::class);
    }
}
