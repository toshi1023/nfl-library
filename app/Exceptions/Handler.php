<?php

namespace App\Exceptions;

use App\Http\Resources\ErrorResource;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
     * サーバーエラー発生時の共通処理を実行
     */
    public function render($request, Throwable $e)
    {
        $e = $this->prepareException($e);

        // バリデーションは通常ルートへ
        if($e instanceof ValidationException) {
            parent::render($request, $e);
            return;
        }

        // ルートが見つからないエラー
        if($e instanceof NotFoundHttpException) {
            logger($e);
        }

        // それ以外は共通エラーメッセージに上書き
        return new ErrorResource($this->setServerErrorMessage($e));
    }

    /**
     * サーバーエラー発生時のレスポンスを設定
     */
    private function setServerErrorMessage(Throwable $e) : array
    {
        return [
            'message'      => [config('const.SystemMessage.UNEXPECTED_ERR')],
            'status'       => config('const.ServerError'),
            'details'      => [
                'message'  => $e->getMessage(),
                'file'     => $e->getFile(),
                'line'     => $e->getLine()
            ]
        ];
    }
}
