<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Http\ViewComposers\AreaComposer;
use App\Http\ViewComposers\AllAreasComposer;
use App\Http\ViewComposers\NotificationComposer;
use App\Http\ViewComposers\AllCategoriesComposer;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(AreaComposer::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', AreaComposer::class);
        View::composer('layouts.partials.navigation', NotificationComposer::class);
        View::composer('listings.partials.form._areas', AllAreasComposer::class);
        View::composer('listings.partials.form._categories', AllCategoriesComposer::class);
    }
}
