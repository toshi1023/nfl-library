<?php

namespace App\Services\Player;

use App\Lib\Common;
use App\Services\Player\PlayerServiceInterface;
use Exception;

class PlayerService
{
    /**
     * ロスターやスターター情報を取得
     */
    public function getPlayerInfo(int $season, string $teamnm) : array
    {
        try {
            $data = [
                'rosters'       => '',
                'starters'      => '',
                'message'       => '',
                'status'        => 200
            ];
    
            return $data;
        } catch (Exception $e) {
            Common::getErrorLog($e, get_class($this), __FUNCTION__);

            // 取得に失敗した場合
            return [
                "message" => config('const.SystemMessage.LOGIN_ERR'),
                "status"  => 401
            ];
        }
    }
}