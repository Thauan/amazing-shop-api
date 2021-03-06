<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Contracts\UserRepository;
use App\Repositories\EloquentUserRepository;
use App\Repositories\Contracts\CommodityRepository;
use App\Repositories\EloquentCommodityRepository;
use App\Repositories\Contracts\BrandRepository;
use App\Repositories\EloquentBrandRepository;
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
        $this->app->bind(CommodityRepository::class, EloquentCommodityRepository::class);
        $this->app->bind(UserRepository::class, EloquentUserRepository::class);
        $this->app->bind(BrandRepository::class, EloquentBrandRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
}
