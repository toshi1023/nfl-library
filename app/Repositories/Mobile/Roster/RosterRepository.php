<?php

namespace App\Repositories\Mobile\Roster;

use App\Repositories\BaseRepository;
use App\Repositories\Mobile\Roster\RosterRepositoryInterface;
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
        return $this->roster()->distinct()->select('season')->get();
    }
}