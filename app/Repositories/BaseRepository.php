<?php

namespace App\Repositories;

use App\Models\Formation;
use App\Models\FoulRule;
use App\Models\PfRelation;
use App\Models\Player;
use App\Models\Position;
use App\Models\Roster;
use App\Models\Setting;
use App\Models\Starter;
use App\Models\Team;
use App\Models\TfRelation;
use App\Models\User;
use App\Repositories\FoulRule\FoulRuleRepositoryInterface;
use App\Repositories\Player\PlayerRepositoryInterface;
use App\Repositories\Roster\RosterRepositoryInterface;
use App\Repositories\Team\TeamRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;

class BaseRepository implements BaseRepositoryInterface
{
    /**
     * UserRepository
     */
    final public function userRepository() : UserRepositoryInterface
    {
        return app()->make(UserRepositoryInterface::class);
    }

    /**
     * FoulRuleRepository
     */
    final public function foulRuleRepository() : FoulRuleRepositoryInterface
    {
        return app()->make(FoulRuleRepositoryInterface::class);
    }

    /**
     * PlayerRepository
     */
    final public function playerRepository() : PlayerRepositoryInterface
    {
        return app()->make(PlayerRepositoryInterface::class);
    }

    /**
     * TeamRepository
     */
    public function teamRepository() : TeamRepositoryInterface
    {
        return app()->make(TeamRepositoryInterface::class);
    }

    /**
     * RosterRepository
     */
    public function rosterRepository() : RosterRepositoryInterface
    {
        return app()->make(RosterRepositoryInterface::class);
    }

    /**
     * Userモデル
     */
    final protected function user() : User
    {
        return app()->make(User::class);
    }

    /**
     * Formationモデル
     */
    final protected function formation() : Formation
    {
        return app()->make(Formation::class);
    }

    /**
     * FoulRuleモデル
     */
    final protected function foulRule() : FoulRule
    {
        return app()->make(FoulRule::class);
    }

    /**
     * PfRelationモデル
     */
    final protected function pfRelation() : PfRelation
    {
        return app()->make(PfRelation::class);
    }

    /**
     * Playerモデル
     */
    final protected function player() : Player
    {
        return app()->make(Player::class);
    }

    /**
     * Positionモデル
     */
    final protected function position() : Position
    {
        return app()->make(Position::class);
    }

    /**
     * Rosterモデル
     */
    final protected function roster() : Roster
    {
        return app()->make(Roster::class);
    }

    /**
     * Settingモデル
     */
    final protected function setting() : Setting
    {
        return app()->make(Setting::class);
    }

    /**
     * Starterモデル
     */
    final protected function starter() : Starter
    {
        return app()->make(Starter::class);
    }

    /**
     * Teamモデル
     */
    final protected function team() : Team
    {
        return app()->make(Team::class);
    }

    /**
     * TfRelationモデル
     */
    final protected function tfRelation() : TfRelation
    {
        return app()->make(TfRelation::class);
    }
}