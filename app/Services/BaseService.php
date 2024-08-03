<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class BaseService implements BaseServiceInterface
{
    /**
     * ユーザ情報を取得(ユーザID, IPアドレス, ユーザエージェント)
     */
    public function getUserInfo() : string
    {
        if (Auth::check()) {
            // ログイン済みの場合
            // return ' :: [ user_id: '.Auth::id().' , IP Adress: '.$request->ip().' , UserAgent: '.$request->header('User-Agent').' ]';
            return ' :: [ user_id: '.Auth::id().' , IP Adress: 0.0.0.0 , UserAgent: '.request()->header('User-Agent').' ]';
        }
        // ログアウトされている場合
        // return ' :: [ user_id: already logout , IP Adress: '.$request->ip().' , UserAgent: '.$request->header('User-Agent').' ]';
        return ' :: [ user_id: already logout , IP Adress: 0.0.0.0 , UserAgent: '.request()->header('User-Agent').' ]';
    }

    /**
     * エラー用のログを出力
     * $e        -- Exceptionクラスのインスタンス, 
     * $class    -- 実行中のクラス名, 
     * $function -- 実行中のメソッド名 
     */
    public function getErrorLog(Exception $e, string $class, string $function) : void
    {
        $msg = config('const.SystemMessage.SYSTEM_ERR').$class.'::'.$function.' (File : '.$e->getFile().' ('. $e->getLine().')) : '.$e->getMessage(). Common::getUserInfo();
        $msg2 = '';

        // 標準メッセージをLogに出力
        Log::error($msg);

        // stack traceをLogに出力
        $index = 1;
        foreach($e->getTrace() as $val) {
            // 例) StackTrace[1] :: /home/test/app/Http/Controllers/TestController.php 22行目, { class: Test , function: test }
            $trace = 'StackTrace['.$index.'] :: '.$val["file"].' '.$val["line"].'行目 , { class: '.$val["class"].' , function: '.$val["function"].' }';
            Log::error($trace);

            if($index === 1) $msg2 = $trace;

            $index += 1;
        }

        // Slackに通知
        // SlackFacade::send(config('const.SystemMessage.SLACK_LOG_WARN').$msg.' , '.$msg2);
    }

    /**
     * サーバーエラー発生時のレスポンスを設定
     */
    public function setServerErrorMessage(Exception $e) : array
    {
        return [
            'error_messages'  => [config('const.SystemMessage.UNEXPECTED_ERR')],
            'status'          => config('const.ServerError'),
            'details'         => [
                'message'  => $e->getMessage(),
                'file'     => $e->getFile(),
                'line'     => $e->getLine()
            ]
        ];
    }
}