<?php

namespace App\Http\Controllers\Api\Mobile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Mobile\LoginRequest;
use App\Services\Mobile\Auth\AuthServiceInterface;
use App\Lib\Common;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;

class AuthController extends Controller
{
    public function __construct(private AuthServiceInterface $service) {}

    /**
     * ログイン管理
     */
    public function login(LoginRequest $request) 
    {
        // 認証処理
        return $this->jsonResponse($this->service->login($request->all()));
    }

    /**
     * ログアウト処理
     */
    public function logout()
    {
        // ログアウト処理の実行
        return $this->jsonResponse($this->service->logout());
    }
}
