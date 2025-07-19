<?php

namespace App\Repositories\Mobile\Team;

use App\Models\Team;
use Illuminate\Database\Eloquent\Collection;

interface TeamRepositoryInterface
{
    /**
     * チーム情報をDBから取得
     * from: teams
     */
    public function queryTeams() : Collection;
}