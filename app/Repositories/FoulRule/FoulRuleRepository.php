<?php

namespace App\Repositories\FoulRule;

use App\Repositories\FoulRule\FoulRuleRepositoryInterface;
use App\Models\FoulRule;
use Illuminate\Database\Eloquent\Collection;

class FoulRuleRepository implements FoulRuleRepositoryInterface
{
    /**
     * ペナルティ情報をDBから取得
     * from: foul_rules
     */
    public function queryFoulRuleInfo(?int $status_type, ?int $yard_info) : Collection
    {
        return FoulRule::statusType($status_type)
                       ->yardInfo($yard_info)
                       ->get();
    }
}