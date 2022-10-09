<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use InvalidArgumentException;

class FoulRule extends Model
{
    use HasFactory;

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    /**
     * 攻守ステータスで絞り込み
     */
    public function scopeStatusType($query, ?int $status_type)
    {
        if(is_null($status_type) || $status_type == config('const.FoulRules.all')) {
            $query;
        } else {
            $query->where('status_type', $status_type);
        }
    }
    /**
     * 罰則ヤードで絞り込み
     */
    public function scopeYardInfo($query, ?int $yard_info)
    {
        if(is_null($yard_info) || $yard_info == config('const.FoulRules.all')) {
            $query;
        } else {
            $query->where('yard_info', $yard_info);
        }
    }
}
