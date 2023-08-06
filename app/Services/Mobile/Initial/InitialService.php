<?php

namespace App\Services\Mobile\Initial;

use App\Repositories\BaseRepositoryInterface;
use App\Services\Mobile\Initial\InitialServiceInterface;
use Illuminate\Support\Facades\Auth;
use InvalidArgumentException;

class InitialService implements InitialServiceInterface
{
    public function __construct(private BaseRepositoryInterface $repository) {}

    /**
     * ログインユーザの設定情報を取得
     */
    public function getAccountInfo(int $user_id) : array
    {
        try {
            // ログインユーザの設定情報を取得
            if(!$user_id) throw new InvalidArgumentException('ユーザIDが無効な値のため検索に失敗しました');
            if($user_id !== Auth::id()) throw new InvalidArgumentException('リクエストされたユーザIDがログインユーザのIDと一致しないため検索に失敗しました');

            return [
                "user"    => $this->repository->userRepository()->queryUserSettingSingle($user_id),
                "message" => null,
                "status"  => config('const.Success'),
            ];
        } catch (Exception $e) {
            Common::getErrorLog($e, get_class($this), __FUNCTION__);

            return Common::setServerErrorMessage($e);
        }
    }
}