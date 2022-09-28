<?php

namespace App\Services\Auth;

use App\Lib\Common;
use App\Models\User;
use App\Repositories\User\UserRepositoryInterface;
use App\Services\Auth\AuthServiceInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthService implements AuthServiceInterface
{
    public function __construct(private UserRepositoryInterface $repository) {}

    /**
     * ログイン処理を実行
     */
    public function login(array $credentials) : array
    {   
        // 認証処理
        $user = $this->repository->queryUserSingle($credentials['email']);

        if (! $user || ! Hash::check($credentials['password'], $user->password)) {
            // 認証に失敗した場合
            return [
                "message" => config('const.SystemMessage.LOGIN_ERR'),
                "status"  => config('const.Unauthorized')
            ];
        }

        // 認証に成功した場合
        Auth::guard(config('auth.defaults.guard'))->attempt($credentials);    // 本命の認証処理
        $this->repository->deleteUserToken($user);
        $token = $this->repository->setUserToken($user);
        return [
            "message" => config('const.SystemMessage.LOGIN_INFO'),
            "status"  => config('const.Success'),
            "token"   => $token
        ];
    }

    /**
     * ログアウト処理を実行
     */
    public function logout() : array
    {
        var_dump(Auth::user());
        return [];
        // ログインチェック
        if(!Auth::check()) return ["message" => config('const.SystemMessage.CHECK_ERR'), "status"  => config('const.Success')];

        // ログアウト処理を実行
        $this->repository->deleteUserToken(Auth::user());
        Auth::guard(config('auth.defaults.guard'))->logout();
        return [
            "message" => config('const.SystemMessage.LOGOUT_INFO'),
            "status"  => config('const.Success')
        ];
    }
}