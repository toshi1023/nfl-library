<?php

namespace App\Http\Controllers\Api\Mobile;

use App\Http\Controllers\Controller;
use App\Services\Mobile\FoulRule\FoulRuleServiceInterface;
use Illuminate\Http\Request;
use App\Lib\Common;
use Exception;

class FoulRuleController extends Controller
{
    public function __construct(private FoulRuleServiceInterface $service) {}

    /**
     * ペナルティのデータをリターン
     */
    public function info(Request $request)
    {
        try {
            // ペナルティ情報を取得
            $result = $this->service->getFoulRuleInfo($request->status_type, $request->yard_info);

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
