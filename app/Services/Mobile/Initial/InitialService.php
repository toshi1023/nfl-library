<?php

namespace App\Services\Mobile\Initial;

use App\Repositories\BaseRepositoryInterface;
use App\Services\BaseService;
use App\Services\Mobile\Initial\InitialServiceInterface;
use Illuminate\Support\Facades\Auth;
use Exception;
use InvalidArgumentException;

class InitialService extends BaseService implements InitialServiceInterface
{
    public function __construct(private BaseRepositoryInterface $repository) {}

    /**
     * ログインユーザの設定情報を取得
     */
    public function getAccountInfo(int $user_id) : array
    {
        // ログインユーザの設定情報を取得
        if(!$user_id) throw new InvalidArgumentException('ユーザIDが無効な値のため検索に失敗しました');
        if($user_id !== Auth::id()) throw new InvalidArgumentException('リクエストされたユーザIDがログインユーザのIDと一致しないため検索に失敗しました');

        return $this->wrapperResponse([
            'user'    => $this->repository->userRepository()->queryUserSettingSingle($user_id),
        ]);
    }
}