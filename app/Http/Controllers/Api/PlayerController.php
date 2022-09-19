<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Player\PlayerServiceInterface;
use Illuminate\Http\Request;
use App\Lib\Common;
use Exception;

class PlayerController extends Controller
{
    public function __construct(private PlayerServiceInterface $service) {}

    public function info(Request $request)
    {
        try {
            // ロスター、スターター情報を取得
            $result = $this->service->getPlayerInfo($request->season, $request->team_name);

            // 取得に成功した場合
            return response()->json([
                "rosters"      => $result["rosters"],
                "starters"     => $result["starters"],
                "info_message" => $result["message"]
            ], $result["status"], [], JSON_UNESCAPED_UNICODE);
        } catch (Exception $e) {
            Common::getErrorLog($e, get_class($this), __FUNCTION__);

            // 認証に失敗した場合
            return response()->json(["error_message" => $result["message"]], $result["status"], [], JSON_UNESCAPED_UNICODE);
        }
    }
}
