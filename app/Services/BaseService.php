<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class BaseService implements BaseServiceInterface
{
    /**
     * レスポンスのラッパーを設定
     */
    public function wrapperResponse(array $data, ?string $status = null, ?string $message = null) : array
    {
        // レスポンスのラッパーを設定
        return [
            'data' => $data,
            'status' => $status ?? config('const.Success'),
            'message' => $message
        ];
    }
}