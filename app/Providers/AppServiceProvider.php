<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Mobile\Auth\AuthServiceInterface;
use App\Services\Mobile\Auth\AuthService;
use App\Services\Mobile\Player\PlayerServiceInterface;
use App\Services\Mobile\Player\PlayerService;
use App\Services\Mobile\Initial\InitialServiceInterface;
use App\Services\Mobile\Initial\InitialService;
use App\Services\Mobile\FoulRule\FoulRuleServiceInterface;
use App\Services\Mobile\FoulRule\FoulRuleService;
use App\Repositories\Mobile\Player\PlayerRepositoryInterface;
use App\Repositories\Mobile\Player\PlayerRepository;
use App\Repositories\Mobile\User\UserRepositoryInterface;
use App\Repositories\Mobile\User\UserRepository;
use App\Repositories\Mobile\FoulRule\FoulRuleRepositoryInterface;
use App\Repositories\Mobile\FoulRule\FoulRuleRepository;

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
