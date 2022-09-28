<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use InvalidArgumentException;

class UserRepository implements UserRepositoryInterface
{
    /**
     * 単一のユーザ情報をDBから取得
     * from: users
     */
    public function queryUserSingle(string $email) : User
    {
        $user = User::email($email)->first();

        if(!$user) return new User();

        return $user;
    }

    /**
     * ユーザの設定情報をDBから取得
     * from: users
     */
    public function queryUserSettingSingle(int $user_id) : User
    {
        $user = User::find($user_id)
                    ->with(['team', 'setting'])
                    ->first();

        if(!$user) return new User();

        return $user;
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