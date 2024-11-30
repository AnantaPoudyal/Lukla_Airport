<?php

namespace App\Providers;

use App\Http\Controllers\NavigationController;

use App\Http\Controllers\NewsController;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
        View::composer('Master_Layout.masterPage', function ($view) {
            $navController = new NavigationController();
            $navLinks = $navController->defineNavigation();
            $navTile = $navController->navbarTitle;


        $news_controller = new NewsController();
        $news = $news_controller->setNews();
        $news_data = $news_controller->getNews()->getData();

            $view->with(['navLinks'=>$navLinks,"nav_title"=>$navTile,"newsData"=>$news_data]);
        });
    }
}
