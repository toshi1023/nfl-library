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
        // ペナルティ情報を取得
        return $this->jsonResponse($this->service->getFoulRuleInfo($request->status_type, $request->yard_info));
    }
}
