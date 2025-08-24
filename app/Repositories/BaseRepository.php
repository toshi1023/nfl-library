<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
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
use App\Repositories\Mobile\FoulRule\FoulRuleRepositoryInterface;
use App\Repositories\Mobile\Player\PlayerRepositoryInterface;
use App\Repositories\Mobile\Roster\RosterRepositoryInterface;
use App\Repositories\Mobile\Team\TeamRepositoryInterface;
use App\Repositories\Mobile\User\UserRepositoryInterface;
use App\Repositories\Admin\Player\PlayerRepositoryInterface as AdminPlayerRepositoryInterface;

class BaseRepository implements BaseRepositoryInterface
{
    /**********************************************************************
     * 共通メソッド
     **********************************************************************/
    /**
     * モデルの更新を行い、更新後のモデルを返す
     * @param Model $model 更新対象のモデル
     * @param array $data 更新するデータ
     * @return Model 更新後のモデル
     */
    protected function updateWithTap(Model $model, array $data): Model
    {
        return tap($model, function ($model) use ($data) {
            $model->update($data);
        });
    }

    /**********************************************************************
     * Repository取得
     **********************************************************************/
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
     * Admin\PlayerRepositoryInterface
     */
    public function adminPlayerRepository() : AdminPlayerRepositoryInterface
    {
        return app()->make(AdminPlayerRepositoryInterface::class);
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