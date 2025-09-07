<?php

namespace App\Services\Admin\Team;

interface TeamServiceInterface
{
    /**
     * 全チーム取得
     */
    public function getAllTeams(array $params = []) : array;

    /**
     * ページネーション付きチーム取得
     */
    public function getPaginatedTeams(int $perPage = 15, array $params = []) : array;

    /**
     * ID指定でチーム取得
     */
    public function getTeamById(int $id) : array;

    /**
     * チーム新規作成
     */
    public function createTeam(array $data) : array;

    /**
     * チーム更新
     */
    public function updateTeam(int $id, array $data) : array;

    /**
     * チーム削除
     */
    public function deleteTeam(int $id) : array;
}