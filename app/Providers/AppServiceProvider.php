<?php

namespace App\Providers;

use App\Http\Page;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        $left_menu = Page::getMenu('left');
        $bottom_menu = Page::getMenu('bottom');

        view()->share('left_menu', $left_menu);
        view()->share('bottom_menu', $bottom_menu);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
