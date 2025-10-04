<?php

namespace App\Services;

use Exception;

interface BaseServiceInterface
{
    /**
     * レスポンスのラッパーを設定
     */
    public function wrapperResponse(array $data, ?string $status = null, ?string $message = null) : array;
}