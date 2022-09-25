<?php

namespace App\Services\Player;

use App\Lib\Common;
use App\Repositories\Player\PlayerRepositoryInterface;
use App\Services\Player\PlayerServiceInterface;
use Exception;

class PlayerService implements PlayerServiceInterface
{
    public function __construct(private PlayerRepositoryInterface $repository) {}

    /**
     * ロスターやスターター情報を取得
     */
    public function getPlayerInfo(int $season, int $team_id) : array
    {
        $data = [
            'rosters'       => $this->repository->queryRosterStarterInfo($season, $team_id),
            'message'       => '',
            'status'        => config('const.Success')
        ];

        return $data;
    }
}