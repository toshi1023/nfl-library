<?php

namespace App\Services\Mobile\Initial;

interface InitialServiceInterface
{
    /**
     * ログインユーザの設定情報を取得
     */
    public function getAccountInfo(int $user_id) : array;
}