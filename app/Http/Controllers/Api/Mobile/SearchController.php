<?php

namespace App\Http\Controllers\Api\Mobile;

use App\Http\Controllers\Controller;
use App\Services\Mobile\Search\SearchServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class SearchController extends Controller
{
    public function __construct(private SearchServiceInterface $service) {}

    /**
     * 検索用ドロップダウンリストに使用するチーム情報のデータをリターン
     */
    public function teamIndex(Request $request) : JsonResponse
    {
        // チーム情報を取得
        return $this->jsonResponse($this->service->getTeamList());
    }

    /**
     * 検索用ドロップダウンリストに使用するシーズン情報のデータをリターン
     */
    public function seasonIndex(Request $request) : JsonResponse
    {
        // シーズン情報を取得
        return $this->jsonResponse($this->service->getSeasonList());
    }
}
