<?php

namespace App\Services\Initial;

interface InitialServiceInterface
{
    /**
     * ログインユーザの設定情報を取得
     */
    public function getAccountInfo(int $user_id) : array;
}