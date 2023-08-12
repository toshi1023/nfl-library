<?php

namespace App\Services\Mobile\Search;

use App\Lib\Common;
use App\Repositories\BaseRepositoryInterface;
use App\Services\Mobile\Search\SearchServiceInterface;
use Exception;
use InvalidArgumentException;

class SearchService implements SearchServiceInterface
{
    public function __construct(private BaseRepositoryInterface $repository) {}

    /**
     * チームの検索情報を取得
     */
    public function getTeamList() : array
    {
        try {
            return [
                'teams'         => $this->repository->teamRepository()->queryTeams(),
                'message'       => null,
                'status'        => config('const.Success')
            ];
        } catch (Exception $e) {
            Common::getErrorLog($e, get_class($this), __FUNCTION__);

            return Common::setServerErrorMessage($e);
        }
    }

    /**
     * ロスターに存在するシーズンの検索情報を取得
     */
    public function getSeasonList() : array
    {
        try {
            return [
                'seasons'         => $this->repository->rosterRepository()->querySeasons(),
                'message'       => null,
                'status'        => config('const.Success')
            ];
        } catch (Exception $e) {
            Common::getErrorLog($e, get_class($this), __FUNCTION__);

            return Common::setServerErrorMessage($e);
        }
    }
}