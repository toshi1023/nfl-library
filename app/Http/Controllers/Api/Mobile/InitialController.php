<?php

namespace App\Http\Controllers\Api\Mobile;

use App\Http\Controllers\Controller;
use App\Services\Mobile\Initial\InitialServiceInterface;
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
        // ログインユーザの設定情報を取得
        return $this->jsonResponse($this->service->getAccountInfo($request->user_id));
    }
}
