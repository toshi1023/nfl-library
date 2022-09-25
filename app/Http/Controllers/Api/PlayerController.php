<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PlayerRequest;
use App\Services\Player\PlayerServiceInterface;
use Illuminate\Http\Request;
use App\Lib\Common;
use InvalidArgumentException;
use Exception;

class PlayerController extends Controller
{
    public function __construct(private PlayerServiceInterface $service) {}

    /**
     * ロスター・スターター・フォーメーションのデータをリターン
     */
    public function info(PlayerRequest $request)
    {
        try {
            // ロスター、スターター情報を取得
            $result = $this->service->getPlayerInfo($request->season, $request->team_id);

            // 取得に成功した場合
            return response()->json([
                "rosters"      => $result["rosters"]
            ], $result["status"], [], JSON_UNESCAPED_UNICODE);
        } catch (Exception $e) {
            Common::getErrorLog($e, get_class($this), __FUNCTION__);

            // resultに値をセット
            $result = Common::setServerErrorMessage();
            return response()->json(["error_message" => $result["message"]], $result["status"], [], JSON_UNESCAPED_UNICODE);
        }
    }
}
