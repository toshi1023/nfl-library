<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Auth\AuthServiceInterface;
use App\Services\Auth\AuthService;
use App\Services\Player\PlayerServiceInterface;
use App\Services\Player\PlayerService;
use App\Repositories\Player\PlayerRepositoryInterface;
use App\Repositories\Player\PlayerRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        /************************************************
         *  サービス層
         ************************************************/
        $this->app->singleton(AuthServiceInterface::class,      AuthService::class);
        $this->app->singleton(PlayerServiceInterface::class,    PlayerService::class);

        /************************************************
         *  リポジトリ層
         ************************************************/
        $this->app->singleton(PlayerRepositoryInterface::class, PlayerRepository::class);
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
