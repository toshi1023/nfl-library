<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Services\Auth\AuthServiceInterface;
use App\Lib\Common;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;

class AuthController extends Controller
{
    public function __construct(private AuthServiceInterface $service) {}

    /**
     * ログイン管理
     */
    public function login(LoginRequest $request) 
    {
        try {
            // 認証処理
            $result = $this->service->login($request->all());

            $result['id']   = Auth::user()->id;
            $result['name'] = Auth::user()->name;

            // 認証に成功した場合
            return $this->jsonResponse($result);
        } catch (Exception $e) {
            Common::getErrorLog($e, get_class($this), __FUNCTION__);

            // resultに値をセット
            $result = Common::setServerErrorMessage();
            return $this->jsonResponse($result);
        }
    }
}
