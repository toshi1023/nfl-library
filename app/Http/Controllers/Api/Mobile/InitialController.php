<?php

namespace App\Http\Controllers\Api\Mobile;

use App\Http\Controllers\Controller;
use App\Services\Mobile\Initial\InitialServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class InitialController extends Controller
{
    public function __construct(private InitialServiceInterface $service) {}

    /**
     * ログインユーザの設定情報をリターン
     */
    public function info(Request $request, int $user_id) : JsonResponse
    {
        // ログインユーザの設定情報を取得
        return $this->jsonResponse($this->service->getAccountInfo($user_id));
    }
}
