<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\Mobile\FoulRule\FoulRuleRepositoryInterface;
use App\Repositories\Mobile\Player\PlayerRepositoryInterface;
use App\Repositories\Mobile\Roster\RosterRepositoryInterface;
use App\Repositories\Mobile\Team\TeamRepositoryInterface;
use App\Repositories\Mobile\User\UserRepositoryInterface;
use App\Repositories\Admin\Player\PlayerRepositoryInterface as AdminPlayerRepositoryInterface;

interface BaseRepositoryInterface
{
    /**********************************************************************
     * Repository取得
     **********************************************************************/
    /**
     * UserRepository
     */
    public function userRepository(): UserRepositoryInterface;

    /**
     * FoulRuleRepository
     */
    public function foulRuleRepository(): FoulRuleRepositoryInterface;

    /**
     * PlayerRepository
     */
    public function playerRepository(): PlayerRepositoryInterface;
    
    /**
     * TeamRepository
     */
    public function teamRepository(): TeamRepositoryInterface;

    /**
     * RosterRepository
     */
    public function rosterRepository(): RosterRepositoryInterface;

    /**
     * Admin\PlayerRepositoryInterface
     */
    public function adminPlayerRepository(): AdminPlayerRepositoryInterface;
}