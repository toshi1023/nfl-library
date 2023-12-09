<?php

namespace App\Repositories\Player;

use App\Repositories\Player\PlayerRepositoryInterface;
use App\Models\Roster;
use App\Models\Starter;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;

class PlayerRepository extends BaseRepository implements PlayerRepositoryInterface
{
    /**
     * ロスター・スターター情報をDBから取得
     * from: rosters
     * join: [players, teams, positions, starters]
     */
    public function queryRosterStarterInfo(int $season, int $team_id) : Collection
    {
        return $this->roster()->season($season)->team($team_id)
                     ->with(['team', 'player', 'position', 'rosterStarter'])
                     ->get();
    }

    /**
     * フォーメーション情報をDBから取得
     * from: starters
     * join: [rosters, players, teams, positions, tf_relations, formations, pf_relations]
     */
    public function queryFormationInfo(int $season, int $team_id) : Collection
    {
        return $this->starter()->get();
    }
}