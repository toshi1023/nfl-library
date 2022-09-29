<?php

namespace App\Services\FoulRule;

use App\Repositories\FoulRule\FoulRuleRepositoryInterface;
use App\Services\FoulRule\FoulRuleServiceInterface;

class FoulRuleService implements FoulRuleServiceInterface
{
    public function __construct(private FoulRuleRepositoryInterface $repository) {}

    /**
     * ペナルティ情報を取得
     */
    public function getFoulRuleInfo(?int $status_type, ?int $yard_info) : array
    {
        return [
            'penalties'     => $this->repository->queryFoulRuleInfo($status_type, $yard_info),
            'message'       => '',
            'status'        => config('const.Success')
        ];
    }
}