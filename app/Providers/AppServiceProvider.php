<?php

namespace App\Providers;

use App\Repositories\AreaRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\CategoryRepository;
use App\Http\Services\Location\GeopluginService;
use App\Repositories\Contracts\AreaRepositoryInterface;
use App\Http\Services\Location\Contracts\LocationFinder;
use App\Repositories\Contracts\CategoryRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(LocationFinder::class, GeopluginService::class);
        $this->app->bind(AreaRepositoryInterface::class, AreaRepository::class);
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

    }
}
