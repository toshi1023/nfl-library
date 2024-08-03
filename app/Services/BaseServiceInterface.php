<?php

namespace App\Services;

use Exception;

interface BaseServiceInterface
{
    /**
     * ユーザ情報を取得(ユーザID, IPアドレス, ユーザエージェント)
     */
    public function getUserInfo() : string;

    /**
     * エラー用のログを出力
     * $e        -- Exceptionクラスのインスタンス, 
     * $class    -- 実行中のクラス名, 
     * $function -- 実行中のメソッド名 
     */
    public function getErrorLog(Exception $e, string $class, string $function) : void;

    /**
     * サーバーエラー発生時のレスポンスを設定
     */
    public function setServerErrorMessage(Exception $e) : array;
}