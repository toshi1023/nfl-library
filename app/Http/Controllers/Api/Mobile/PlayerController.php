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
        try {
            // ロスター、スターター情報を取得
            $result = $this->service->getPlayerInfo($request->season, $request->team_id);

            // 取得に成功した場合
            return $this->jsonResponse($result);
        } catch (Exception $e) {
            Common::getErrorLog($e, get_class($this), __FUNCTION__);

            // resultに値をセット
            $result = Common::setServerErrorMessage();
            return $this->jsonResponse($result);
        }
    }
}
