<?php

namespace App\Services\Admin\Player;

interface PlayerServiceInterface
{
    /**
     * 全プレイヤーを取得
     */
    public function getAllPlayers() : array;

    /**
     * プレイヤーをページネーションで取得
     */
    public function getPaginatedPlayers(int $perPage = 15) : array;

    /**
     * IDでプレイヤーを取得
     */
    public function getPlayerById(int $id) : array;

    /**
     * プレイヤーを作成
     */
    public function createPlayer(array $data) : array;

    /**
     * プレイヤーを更新
     */
    public function updatePlayer(int $id, array $data) : array;

    /**
     * プレイヤーを削除
     */
    public function deletePlayer(int $id) : array;
}