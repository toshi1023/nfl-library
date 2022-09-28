<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Initial\InitialServiceInterface;
use Illuminate\Http\Request;
use App\Lib\Common;
use Exception;

class InitialController extends Controller
{
    public function __construct(private InitialServiceInterface $service) {}

    /**
     * ログインユーザの設定情報をリターン
     */
    public function info(Request $request)
    {
        try {
            // ログインユーザの設定情報を取得
            $result = $this->service->getAccountInfo($request->user_id);

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
