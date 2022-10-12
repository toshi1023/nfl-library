<?php

namespace App\Services\Mobile\FoulRule;

interface FoulRuleServiceInterface
{
    /**
     * ペナルティ情報を取得
     */
    public function getFoulRuleInfo(?int $status_type, ?int $yard_info) : array;
}