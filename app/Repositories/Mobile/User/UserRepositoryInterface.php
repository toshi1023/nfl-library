<?php

namespace App\Repositories\Mobile\User;

use App\Models\User;

interface UserRepositoryInterface
{
    /**
     * 単一のユーザ情報をDBから取得
     * from: users
     */
    public function queryUserSingle(string $email) : User;

    /**
     * ユーザの設定情報をDBから取得
     * from: users
     */
    public function queryUserSettingSingle(int $user_id) : User;

    /**
     * トークンの生成
     * from: personal_access_tokens
     */
    public function setUserToken(User $user) : string;

    /**
     * トークンの削除
     * from: personal_access_tokens
     */
    public function deleteUserToken(User $user) : void;
}