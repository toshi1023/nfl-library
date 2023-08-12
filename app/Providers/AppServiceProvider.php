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
use App\Repositories\BaseRepositoryInterface;
use App\Repositories\BaseRepository;
use App\Repositories\Player\PlayerRepositoryInterface;
use App\Repositories\Player\PlayerRepository;
use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\User\UserRepository;
use App\Repositories\FoulRule\FoulRuleRepositoryInterface;
use App\Repositories\FoulRule\FoulRuleRepository;
use App\Repositories\Roster\RosterRepository;
use App\Repositories\Roster\RosterRepositoryInterface;
use App\Repositories\Team\TeamRepository;
use App\Repositories\Team\TeamRepositoryInterface;
use App\Services\Mobile\Search\SearchService;
use App\Services\Mobile\Search\SearchServiceInterface;

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
        $this->app->singleton(SearchServiceInterface::class,        SearchService::class);

        /************************************************
         *  リポジトリ層
         ************************************************/
        $this->app->singleton(BaseRepositoryInterface::class,       BaseRepository::class);
        $this->app->singleton(PlayerRepositoryInterface::class,     PlayerRepository::class);
        $this->app->singleton(UserRepositoryInterface::class,       UserRepository::class);
        $this->app->singleton(FoulRuleRepositoryInterface::class,   FoulRuleRepository::class);
        $this->app->singleton(TeamRepositoryInterface::class,       TeamRepository::class);
        $this->app->singleton(RosterRepositoryInterface::class,     RosterRepository::class);
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
