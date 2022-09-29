<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Auth\AuthServiceInterface;
use App\Services\Auth\AuthService;
use App\Services\Player\PlayerServiceInterface;
use App\Services\Player\PlayerService;
use App\Services\Initial\InitialServiceInterface;
use App\Services\Initial\InitialService;
use App\Services\FoulRule\FoulRuleServiceInterface;
use App\Services\FoulRule\FoulRuleService;
use App\Repositories\Player\PlayerRepositoryInterface;
use App\Repositories\Player\PlayerRepository;
use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\User\UserRepository;
use App\Repositories\FoulRule\FoulRuleRepositoryInterface;
use App\Repositories\FoulRule\FoulRuleRepository;

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
        $this->app->singleton(AuthServiceInterface::class,          AuthService::class);
        $this->app->singleton(PlayerServiceInterface::class,        PlayerService::class);
        $this->app->singleton(InitialServiceInterface::class,       InitialService::class);
        $this->app->singleton(FoulRuleServiceInterface::class,      FoulRuleService::class);

        /************************************************
         *  リポジトリ層
         ************************************************/
        $this->app->singleton(PlayerRepositoryInterface::class,     PlayerRepository::class);
        $this->app->singleton(UserRepositoryInterface::class,       UserRepository::class);
        $this->app->singleton(FoulRuleRepositoryInterface::class,   FoulRuleRepository::class);
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
