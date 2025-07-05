<?php

namespace App\Services\Mobile\Search;

use App\Lib\Common;
use App\Repositories\BaseRepositoryInterface;
use App\Services\BaseService;
use App\Services\Mobile\Search\SearchServiceInterface;
use Exception;
use InvalidArgumentException;

class SearchService extends BaseService implements SearchServiceInterface
{
    public function __construct(private BaseRepositoryInterface $repository) {}

    /**
     * チームの検索情報を取得
     */
    public function getTeamList() : array
    {
        return $this->wrapperResponse([
            'teams'         => $this->repository->teamRepository()->queryTeams()
        ]);
    }

    /**
     * ロスターに存在するシーズンの検索情報を取得
     */
    public function getSeasonList() : array
    {
        return $this->wrapperResponse([
            'seasons'       => $this->repository->rosterRepository()->querySeasons()
        ]);
    }
}