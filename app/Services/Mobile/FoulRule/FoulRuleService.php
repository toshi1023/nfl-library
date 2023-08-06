<?php

namespace App\Services\Mobile\FoulRule;

use App\Lib\Common;
use App\Repositories\BaseRepositoryInterface;
use App\Services\Mobile\FoulRule\FoulRuleServiceInterface;
use Exception;
use InvalidArgumentException;

class FoulRuleService implements FoulRuleServiceInterface
{
    public function __construct(private BaseRepositoryInterface $repository) {}

    /**
     * ペナルティ情報を取得
     */
    public function getFoulRuleInfo(?int $status_type, ?int $yard_info) : array
    {
        try {
            // 値チェック
            if($status_type && $status_type > 2) throw new InvalidArgumentException('攻守ステータスの検索値が無効な値のため検索に失敗しました');
            if(!is_null($yard_info) && !$yard_info) throw new InvalidArgumentException('罰則ヤード情報の検索値が無効な値のため検索に失敗しました');
            // ペナルティ情報を取得
            return [
                'penalties'     => $this->repository->foulRuleRepository()->queryFoulRuleInfo($status_type, $yard_info),
                'message'       => null,
                'status'        => config('const.Success')
            ];
        } catch (Exception $e) {
            Common::getErrorLog($e, get_class($this), __FUNCTION__);

            return Common::setServerErrorMessage($e);
        }
    }
}