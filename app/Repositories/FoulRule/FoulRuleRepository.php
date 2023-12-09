<?php

namespace App\Repositories\FoulRule;

use App\Repositories\FoulRule\FoulRuleRepositoryInterface;
use App\Models\FoulRule;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;

class FoulRuleRepository extends BaseRepository implements FoulRuleRepositoryInterface
{
    /**
     * ペナルティ情報をDBから取得
     * from: foul_rules
     */
    public function queryFoulRuleInfo(?int $status_type, ?int $yard_info) : Collection
    {
        return $this->foulRule()->statusType($status_type)
                    ->yardInfo($yard_info)
                    ->get();
    }
}