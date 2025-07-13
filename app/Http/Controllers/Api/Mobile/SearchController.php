<?php

namespace App\Http\Controllers\Api\Mobile;

use App\Http\Controllers\Controller;
use App\Services\Mobile\Search\SearchServiceInterface;
use Illuminate\Http\Request;
use App\Http\Resources\Mobile\Season\SeasonListResource;
use App\Http\Resources\Mobile\Team\TeamListResource;

class SearchController extends Controller
{
    public function __construct(private SearchServiceInterface $service) {}

    /**
     * 検索用ドロップダウンリストに使用するチーム情報のデータをリターン
     */
    public function teamIndex(Request $request) : TeamListResource
    {
        // チーム情報を取得
        return new TeamListResource($this->service->getTeamList());
    }

    /**
     * 検索用ドロップダウンリストに使用するシーズン情報のデータをリターン
     */
    public function seasonIndex(Request $request) : SeasonListResource
    {
        // シーズン情報を取得
        return new SeasonListResource($this->service->getSeasonList());
    }
}
