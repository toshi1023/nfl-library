<?php

namespace App\Repositories\Admin\Team;

use App\Models\Team;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface TeamRepositoryInterface
{
    /**
     * 全チーム取得
     */
    public function getAllTeams() : Collection;

    /**
     * ページネーション付きチーム取得
     */
    public function getPaginatedTeams(int $perPage = 15, array $params = []) : LengthAwarePaginator;

    /**
     * ID指定でチーム取得
     */
    public function getTeamById(int $id) : ?Team;

    /**
     * チーム新規作成
     */
    public function createTeam(array $data) : Team;

    /**
     * チーム更新
     */
    public function updateTeam(int $id, array $data) : Team;

    /**
     * チーム削除
     */
    public function deleteTeam(int $id) : bool;
}