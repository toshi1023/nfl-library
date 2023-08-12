<?php

namespace App\Repositories\Roster;

use App\Repositories\BaseRepository;
use App\Repositories\Roster\RosterRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use InvalidArgumentException;

class RosterRepository extends BaseRepository implements RosterRepositoryInterface
{
    /**
     * 年代情報をDBから取得
     * from: rosters
     */
    public function querySeasons() : Collection
    {
        $roster = $this->roster();
        return $roster->distinct()->select('season')->get();
    }
}