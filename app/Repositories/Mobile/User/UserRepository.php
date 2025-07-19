<?php

namespace App\Repositories\Mobile\User;

use App\Models\User;
use App\Repositories\BaseRepository;
use App\Repositories\Mobile\User\UserRepositoryInterface;
use InvalidArgumentException;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    /**
     * 単一のユーザ情報をDBから取得
     * from: users
     */
    public function queryUserSingle(string $email) : User
    {
        $model = $this->user()->email($email)->first();

        if(!$model) return new User();

        return $model;
    }

    /**
     * ユーザの設定情報をDBから取得
     * from: users
     */
    public function queryUserSettingSingle(int $user_id) : User
    {
        $model = $this->user()->find($user_id)
                      ->with(['team', 'setting'])
                      ->first();

        if(!$model) return new User();

        return $model;
    }

    /**
     * トークンの生成
     * from: personal_access_tokens
     */
    public function setUserToken(User $user) : string
    {
        if(!$user) throw new InvalidArgumentException('ユーザデータがnullのためトークン生成の処理が実行できません');
        return $user->createToken($user->email)->plainTextToken;
    }

    /**
     * トークンの削除
     * from: personal_access_tokens
     */
    public function deleteUserToken(User $user) : void
    {
        if(!$user) throw new InvalidArgumentException('ユーザデータがnullのためトークン削除の処理が実行できません');
        $user->tokens()->where('name', $user->email)->delete();
    }
}