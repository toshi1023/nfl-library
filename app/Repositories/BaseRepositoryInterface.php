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
     * 共通メソッド
     **********************************************************************/
    /**
     * モデルの更新を行い、更新後のモデルを返す
     * @param Model $model 更新対象のモデル
     * @param array $data 更新するデータ
     * @return Model 更新後のモデル
     */
    public function updateWithTap(Model $model, array $data): Model;

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