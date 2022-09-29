<?php

namespace App\Repositories\Player;

use Illuminate\Database\Eloquent\Collection;

interface PlayerRepositoryInterface
{
    /**
     * ロスター・スターター情報をDBから取得
     * from: rosters
     * join: [players, teams, positions, starters]
     */
    public function queryRosterStarterInfo(int $season, int $team_id) : Collection;

    /**
     * フォーメーション情報をDBから取得
     * from: starters
     * join: [rosters, players, teams, positions, tf_relations, formations, pf_relations]
     */
    public function queryFormationInfo(int $season, int $team_id) : Collection;
}