<?php

namespace App\Services\Mobile\Auth;

interface AuthServiceInterface
{
    /**
     * ログイン処理を実行
     */
    public function login(array $credentials) : array;

    /**
     * ログアウト処理を実行
     */
    public function logout() : array;
}