<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\BaseServiceInterface;
use App\Services\BaseService;
use App\Services\Mobile\Auth\AuthServiceInterface;
use App\Services\Mobile\Auth\AuthService;
use App\Services\Mobile\Player\PlayerServiceInterface;
use App\Services\Mobile\Player\PlayerService;
use App\Services\Mobile\Initial\InitialServiceInterface;
use App\Services\Mobile\Initial\InitialService;
use App\Services\Mobile\FoulRule\FoulRuleServiceInterface;
use App\Services\Mobile\FoulRule\FoulRuleService;
use App\Services\Mobile\Search\SearchService;
use App\Services\Mobile\Search\SearchServiceInterface;
use App\Services\Admin\Player\PlayerService as AdminPlayerService;
use App\Services\Admin\Player\PlayerServiceInterface as AdminPlayerServiceInterface;
use App\Repositories\BaseRepositoryInterface;
use App\Repositories\BaseRepository;
use App\Repositories\Mobile\Player\PlayerRepositoryInterface;
use App\Repositories\Mobile\Player\PlayerRepository;
use App\Repositories\Mobile\User\UserRepositoryInterface;
use App\Repositories\Mobile\User\UserRepository;
use App\Repositories\Mobile\FoulRule\FoulRuleRepositoryInterface;
use App\Repositories\Mobile\FoulRule\FoulRuleRepository;
use App\Repositories\Mobile\Roster\RosterRepository;
use App\Repositories\Mobile\Roster\RosterRepositoryInterface;
use App\Repositories\Mobile\Team\TeamRepository;
use App\Repositories\Mobile\Team\TeamRepositoryInterface;
use App\Repositories\Admin\Player\PlayerRepository as AdminPlayerRepository;
use App\Repositories\Admin\Player\PlayerRepositoryInterface as AdminPlayerRepositoryInterface;

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
        $this->app->singleton(BaseServiceInterface::class,          BaseService::class);
        $this->app->singleton(AuthServiceInterface::class,          AuthService::class);
        $this->app->singleton(PlayerServiceInterface::class,        PlayerService::class);
        $this->app->singleton(InitialServiceInterface::class,       InitialService::class);
        $this->app->singleton(FoulRuleServiceInterface::class,      FoulRuleService::class);
        $this->app->singleton(SearchServiceInterface::class,        SearchService::class);
        
        // Admin Services
        $this->app->singleton(AdminPlayerServiceInterface::class,   AdminPlayerService::class);

        /************************************************
         *  リポジトリ層
         ************************************************/
        $this->app->singleton(BaseRepositoryInterface::class,       BaseRepository::class);
        $this->app->singleton(PlayerRepositoryInterface::class,     PlayerRepository::class);
        $this->app->singleton(UserRepositoryInterface::class,       UserRepository::class);
        $this->app->singleton(FoulRuleRepositoryInterface::class,   FoulRuleRepository::class);
        $this->app->singleton(TeamRepositoryInterface::class,       TeamRepository::class);
        $this->app->singleton(RosterRepositoryInterface::class,     RosterRepository::class);
        
        // Admin Repositories
        $this->app->singleton(AdminPlayerRepositoryInterface::class, AdminPlayerRepository::class);
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
