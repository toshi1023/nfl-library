<?php

namespace App\Repositories\FoulRule;

use Illuminate\Database\Eloquent\Collection;

interface FoulRuleRepositoryInterface
{
    /**
     * ペナルティ情報をDBから取得
     * from: foul_rules
     */
    public function queryFoulRuleInfo(?int $status_type, ?int $yard_info) : Collection;
}