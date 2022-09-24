<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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
    public function info(Request $request)
    {
        try {
            // 検索条件が正しく設定されているかチェック
            if(is_null($request->season)) throw new InvalidArgumentException('シーズンがnullのため検索に失敗しました');
            if(is_null($request->team_id)) throw new InvalidArgumentException('シーズンがnullのため検索に失敗しました');

            // ロスター、スターター情報を取得
            $result = $this->service->getPlayerInfo($request->season, $request->team_id);

            // 取得に成功した場合
            return response()->json([
                "rosters"      => $result["rosters"]
            ], $result["status"], [], JSON_UNESCAPED_UNICODE);
        } catch (Exception $e) {
            Common::getErrorLog($e, get_class($this), __FUNCTION__);

            // resultをどうするか。。。
            return response()->json(["error_message" => $result["message"]], $result["status"], [], JSON_UNESCAPED_UNICODE);
        }
    }
}
