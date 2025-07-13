<?php

namespace App\Http\Controllers\Api\Mobile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Mobile\LoginRequest;
use App\Http\Resources\BaseResource;
use App\Services\Mobile\Auth\AuthServiceInterface;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    public function __construct(private AuthServiceInterface $service) {}

    /**
     * ログイン管理
     */
    public function login(LoginRequest $request) : BaseResource
    {
        // 認証処理
        return new BaseResource($this->service->login($request->validated()));
    }

    /**
     * ログアウト処理
     */
    public function logout() : BaseResource
    {
        // ログアウト処理の実行
        return new BaseResource($this->service->logout());
    }
}
