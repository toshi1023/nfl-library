<?php

namespace App\Repositories\Admin\Player;

use App\Models\Player;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface PlayerRepositoryInterface
{
    /**
     * 全プレイヤーを取得
     */
    public function getAllPlayers(array $params = []) : Collection;

    /**
     * プレイヤーをページネーションで取得
     */
    public function getPaginatedPlayers(int $perPage = 15, array $params = []) : LengthAwarePaginator;

    /**
     * IDでプレイヤーを取得
     */
    public function getPlayerById(int $id) : ?Player;

    /**
     * プレイヤーを作成
     */
    public function createPlayer(array $data) : Player;

    /**
     * プレイヤーを更新
     */
    public function updatePlayer(int $id, array $data) : Player;

    /**
     * プレイヤーを削除
     */
    public function deletePlayer(int $id) : bool;
}