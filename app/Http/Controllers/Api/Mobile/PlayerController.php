<?php

namespace App\Http\Controllers\Api\Mobile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Mobile\PlayerRequest;
use App\Services\Mobile\Player\PlayerServiceInterface;
use Illuminate\Http\Request;
use App\Lib\Common;
use Exception;

class PlayerController extends Controller
{
    public function __construct(private PlayerServiceInterface $service) {}

    /**
     * ロスター・スターター・フォーメーションのデータをリターン
     */
    public function info(PlayerRequest $request)
    {
        // ロスター、スターター情報を取得
        return $this->jsonResponse($this->service->getPlayerInfo($request->season, $request->team_id));
    }
}
