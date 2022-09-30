<?php

namespace App\Services\Initial;

use App\Repositories\User\UserRepositoryInterface;
use App\Services\Initial\InitialServiceInterface;
use InvalidArgumentException;

class InitialService implements InitialServiceInterface
{
    public function __construct(private UserRepositoryInterface $repository) {}

    /**
     * ログインユーザの設定情報を取得
     */
    public function getAccountInfo(int $user_id) : array
    {
        // 値チェック
        if(!$user_id) throw new InvalidArgumentException('ユーザIDが無効な値のため検索に失敗しました');

        return [
            "user"    => $this->repository->queryUserSettingSingle($user_id),
            "message" => null,
            "status"  => config('const.Success'),
        ];
    }
}