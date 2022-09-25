<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * レスポンス共通メソッド
     */
    protected function jsonResponse(array $data) : JsonResponse
    {
        return response()->json(
            $data, 
            array_key_exists('status', $data) ? $data['status'] : config('const.Success'), 
            [], 
            JSON_UNESCAPED_UNICODE
        );
    }
}
