<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Auth\AuthServiceInterface;
use App\Lib\Common;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Password;
use App\Models\User;

class AuthController extends Controller
{
    public function __construct(private AuthServiceInterface $service) {}

    /**
     * ログイン管理
     */
    public function login(Request $request) 
    {
        try {
            // 認証処理
            $result = $this->service->login($request->status, [
                'email'    => 'required|email',
                'password' => 'required'
            ]);

            // 認証に成功した場合
            return response()->json([
                "id"           => Auth::user()->id,
                "name"         => Auth::user()->name,
                "info_message" => $result["message"]
            ], $result["status"], [], JSON_UNESCAPED_UNICODE);
        } catch (Exception $e) {
            Common::getErrorLog($e, get_class($this), __FUNCTION__);

            // 認証に失敗した場合
            return response()->json(["error_message" => $result["message"]], $result["status"], [], JSON_UNESCAPED_UNICODE);
        }
    }
}
