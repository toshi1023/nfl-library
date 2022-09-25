<?php

namespace App\Services\Auth;

use App\Lib\Common;
use App\Services\Auth\AuthServiceInterface;

class AuthService implements AuthServiceInterface
{
    // public function __construct(private UserRepositoryInterface $db) {}

    /**
     * ログイン処理を実行
     */
    public function login(array $credentials) : array
    {   
        // 認証処理
        if($this->getGuard()->attempt($credentials)) {
            return [
                "message" => config('const.SystemMessage.LOGIN_INFO'),
                "status"  => config('const.Success')
            ];
        }

        // 認証に失敗した場合
        return [
            "message" => config('const.SystemMessage.LOGIN_ERR'),
            "status"  => config('const.Unauthorized')
        ];
    }
}