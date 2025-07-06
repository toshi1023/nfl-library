<?php

namespace App\Services\Mobile\Player;

use App\Lib\Common;
use App\Repositories\BaseRepositoryInterface;
use App\Services\BaseService;
use App\Services\Mobile\Player\PlayerServiceInterface;
use Exception;
use InvalidArgumentException;

class PlayerService extends BaseService implements PlayerServiceInterface
{
    public function __construct(private BaseRepositoryInterface $repository) {}

    /**
     * ロスターやスターター情報を取得
     */
    public function getPlayerInfo(int $season, int $team_id) : array
    {
        // 値チェック
        if(!$season) throw new InvalidArgumentException('シーズンが無効な値のため検索に失敗しました');
        if(!$team_id) throw new InvalidArgumentException('チームが無効な値のため検索に失敗しました');
        // ロスター、スターター情報を取得
        return $this->wrapperResponse([
            'rosters' => $this->repository->playerRepository()->queryRosterStarterInfo($season, $team_id),
        ]);
    }
}