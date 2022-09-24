<?php

namespace App\Services\Player;

interface PlayerServiceInterface
{
    /**
     * ロスターやスターター情報を取得
     */
    public function getPlayerInfo(int $season, int $team_id) : array;
}