<?php

namespace App\Services\Mobile\FoulRule;

use App\Repositories\Mobile\FoulRule\FoulRuleRepositoryInterface;
use App\Services\Mobile\FoulRule\FoulRuleServiceInterface;

class FoulRuleService implements FoulRuleServiceInterface
{
    public function __construct(private FoulRuleRepositoryInterface $repository) {}

    /**
     * ペナルティ情報を取得
     */
    public function getFoulRuleInfo(?int $status_type, ?int $yard_info) : array
    {
        try {
            // ペナルティ情報を取得
            return [
                'penalties'     => $this->repository->queryFoulRuleInfo($status_type, $yard_info),
                'message'       => null,
                'status'        => config('const.Success')
            ];
        } catch (Exception $e) {
            Common::getErrorLog($e, get_class($this), __FUNCTION__);

            return Common::setServerErrorMessage($e);
        }
    }
}