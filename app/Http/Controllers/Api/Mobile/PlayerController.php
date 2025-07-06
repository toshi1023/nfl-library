<?php

namespace App\Http\Controllers\Api\Mobile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Mobile\PlayerRequest;
use App\Http\Resources\Player\PlayerListResource;
use App\Services\Mobile\Player\PlayerServiceInterface;
use Illuminate\Http\JsonResponse;

class PlayerController extends Controller
{
    public function __construct(private PlayerServiceInterface $service) {}

    /**
     * ロスター・スターター・フォーメーションのデータをリターン
     */
    public function info(PlayerRequest $request) : PlayerListResource
    {
        // ロスター、スターター情報を取得
        return new PlayerListResource(
            $this->service->getPlayerInfo($request->season, $request->team_id)
        );
    }
}
