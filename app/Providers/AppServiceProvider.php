<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\CommodityRepository;
use App\Repositories\CommodityRepositoryInterface;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CommodityRepositoryInterface::class, CommodityRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
