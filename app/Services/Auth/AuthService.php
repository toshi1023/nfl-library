<?php

namespace App\Services\Auth;

use App\Lib\Common;
use App\Services\Auth\AuthServiceInterface;
use Illuminate\Support\Facades\Auth;
use Exception;

class AuthService implements AuthServiceInterface
{
    // public function __construct(private UserRepositoryInterface $db) {}

    /**
     * ログイン処理を実行
     */
    public function login(string $status, array $validation) : array
    {
        // statusチェック(退会 or 停止かどうかチェック)
        if($status === config('const.User.UNSUBSCRIBE') || $status === config('const.User.STOP')) {
            // エラーを返す
            return [
                "message" => config('const.SystemMessage.UNAUTHORIZATION'),
                "status"  => config('const.Unauthorized')
            ];
        }
        
        // 認証処理
        $credentials = request()->validate($validation);
        if($this->getGuard()->attempt($credentials)) {
            $repository = app()->make(UserRepositoryInterface::class);

            // 管理者の場合はワンタイムパスワードを保存
            if(Auth::user()->status === config('const.User.ADMIN')) {
                // ワンタイムパスワード発行
                $onePass = Common::issueOnetimePassword(false);
                // ワンタイムパスワードを保存
                $repository->saveOnePass($onePass, Auth::user()->id);
                // ワンタイムパスワードの通知メールを送信
                SendEmail::dispatch(['id' => Auth::user()->id, 'email' => Auth::user()->email]);
            }

            // User-Agentを保存
            $data = [
                'id'            => Auth::user()->id,
                'user_agent'    => request()->header('User-Agent')
            ];
            $repository->save($data);

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