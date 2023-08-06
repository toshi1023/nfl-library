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
use App\Repositories\User\UserRepositoryInterface;

class BaseRepository implements BaseRepositoryInterface
{
    /**
     * UserRepository
     */
    final public function userRepository()
    {
        return app()->make(UserRepositoryInterface::class);
    }

    /**
     * FoulRuleRepository
     */
    final public function foulRuleRepository()
    {
        return app()->make(FoulRuleRepositoryInterface::class);
    }

    /**
     * PlayerRepository
     */
    final public function playerRepository()
    {
        return app()->make(PlayerRepositoryInterface::class);
    }

    /**
     * Userモデル
     */
    final protected function user() : User
    {
        return new User();
    }

    /**
     * Formationモデル
     */
    final protected function formation() : Formation
    {
        return new Formation();
    }

    /**
     * FoulRuleモデル
     */
    final protected function foulRule() : FoulRule
    {
        return new FoulRule();
    }

    /**
     * PfRelationモデル
     */
    final protected function pfRelation() : PfRelation
    {
        return new PfRelation();
    }

    /**
     * Playerモデル
     */
    final protected function player() : Player
    {
        return new Player();
    }

    /**
     * Positionモデル
     */
    final protected function position() : Position
    {
        return new Position();
    }

    /**
     * Rosterモデル
     */
    final protected function roster() : Roster
    {
        return new Roster();
    }

    /**
     * Settingモデル
     */
    final protected function setting() : Setting
    {
        return new Setting();
    }

    /**
     * Starterモデル
     */
    final protected function starter() : Starter
    {
        return new Starter();
    }

    /**
     * Teamモデル
     */
    final protected function team() : Team
    {
        return new Team();
    }

    /**
     * TfRelationモデル
     */
    final protected function tfRelation() : TfRelation
    {
        return new TfRelation();
    }
}