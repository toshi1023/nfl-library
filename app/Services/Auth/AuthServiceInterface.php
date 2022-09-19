<?php

namespace App\Services\Auth;

interface AuthServiceInterface
{
    /**
     * ログイン処理を実行
     */
    public function login(string $status, array $validation) : array;
}