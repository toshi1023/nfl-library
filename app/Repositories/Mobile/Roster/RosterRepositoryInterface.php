<?php

namespace App\Repositories\Mobile\Roster;

use Illuminate\Database\Eloquent\Collection;

interface RosterRepositoryInterface
{
    /**
     * 年代情報をDBから取得
     * from: rosters
     */
    public function querySeasons() : Collection;
}