<?php

namespace App\Repositories\Mobile\Team;

use App\Models\User;
use App\Repositories\BaseRepository;
use App\Repositories\Mobile\Team\TeamRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use InvalidArgumentException;

class TeamRepository extends BaseRepository implements TeamRepositoryInterface
{
    /**
     * チーム情報をDBから取得
     * from: teams
     */
    public function queryTeams() : Collection
    {
        return $this->team()->get();
    }
}