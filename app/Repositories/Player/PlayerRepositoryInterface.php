<?php

namespace App\Repositories\Player;

use App\Models\Roster;
use App\Models\Starter;

interface PlayerRepositoryInterface
{
    /**
     * ロスター・スターター情報をDBから取得
     * from: rosters
     * join: [players, teams, positions, starters]
     */
    public function queryRosterStarterInfo(int $season, int $team_id) : Roster;

    /**
     * フォーメーション情報をDBから取得
     * from: starters
     * join: [rosters, players, teams, positions, tf_relations, formations, pf_relations]
     */
    public function queryFormationInfo(int $season, int $team_id) : Starter;
}