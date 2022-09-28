<?php

namespace App\Services\Initial;

use App\Lib\Common;
use App\Models\User;
use App\Repositories\User\UserRepositoryInterface;
use App\Services\Initial\InitialServiceInterface;

class InitialService implements InitialServiceInterface
{
    public function __construct(private UserRepositoryInterface $repository) {}

    /**
     * ログインユーザの設定情報を取得
     */
    public function getAccountInfo(int $user_id) : array
    {
        return [
            "user"    => $this->repository->queryUserSettingSingle($user_id),
            "message" => '',
            "status"  => config('const.Success'),
        ];
    }
}