<?php

namespace App\Services\Mobile\Auth;

use App\Lib\Common;
use App\Repositories\BaseRepositoryInterface;
use App\Services\Mobile\Auth\AuthServiceInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Exception;
use InvalidArgumentException;

class AuthService implements AuthServiceInterface
{
    public function __construct(private BaseRepositoryInterface $repository) {}

    /**
     * ログイン処理を実行
     */
    public function login(array $credentials) : array
    {   
        try {
            // 値チェック
            if(!array_key_exists('email', $credentials) || !$credentials['email']) throw new InvalidArgumentException('メールアドレスが無効な値のため検索に失敗しました');
            if(!array_key_exists('password', $credentials) || !$credentials['password']) throw new InvalidArgumentException('パスワードが無効な値のため検索に失敗しました');
            
            // 認証処理
            $user = $this->repository->userRepository()->queryUserSingle($credentials['email']);
            
            if (!$user || !Hash::check($credentials['password'], $user->password)) {
                // 認証に失敗した場合
                return [
                    "message" => config('const.SystemMessage.LOGIN_ERR'),
                    "status"  => config('const.Unauthorized')
                ];
            }

            // 認証に成功した場合
            Auth::guard(config('auth.defaults.guard'))->attempt($credentials);    // 本命の認証処理
            $this->repository->userRepository()->deleteUserToken($user);
            $token = $this->repository->userRepository()->setUserToken($user);
            return [
                "id"      => Auth::id(),
                "name"    => Auth::user()->name,
                "message" => config('const.SystemMessage.LOGIN_INFO'),
                "status"  => config('const.Success'),
                "token"   => $token
            ];
        } catch (Exception $e) {
            Common::getErrorLog($e, get_class($this), __FUNCTION__);

            return Common::setServerErrorMessage($e);
        }
    }

    /**
     * ログアウト処理を実行
     */
    public function logout() : array
    {
        try {
            // ログインチェック
            if(!Auth::check()) return ["message" => config('const.SystemMessage.CHECK_ERR'), "status"  => config('const.Success')];

            // ログアウト処理を実行
            $this->repository->userRepository()->deleteUserToken(Auth::user());
            Auth::guard('web')->logout();
            return [
                "message" => config('const.SystemMessage.LOGOUT_INFO'),
                "status"  => config('const.Success')
            ];
        } catch (Exception $e) {
            Common::getErrorLog($e, get_class($this), __FUNCTION__);

            return Common::setServerErrorMessage($e);
        }
    }
}