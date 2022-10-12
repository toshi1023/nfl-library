<?php

namespace App\Services\Mobile\Player;

use App\Lib\Common;
use App\Repositories\Mobile\Player\PlayerRepositoryInterface;
use App\Services\Mobile\Player\PlayerServiceInterface;
use Exception;
use InvalidArgumentException;

class PlayerService implements PlayerServiceInterface
{
    public function __construct(private PlayerRepositoryInterface $repository) {}

    /**
     * ロスターやスターター情報を取得
     */
    public function getPlayerInfo(int $season, int $team_id) : array
    {
        // 値チェック
        if(!$season) throw new InvalidArgumentException('シーズンが無効な値のため検索に失敗しました');
        if(!$team_id) throw new InvalidArgumentException('チームが無効な値のため検索に失敗しました');

        return [
            'rosters'       => $this->repository->queryRosterStarterInfo($season, $team_id),
            'message'       => null,
            'status'        => config('const.Success')
        ];
    }
}