<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $appends = ['birthday_date'];
    
    /**
     * 生年月日を取得
     */
    public function getBirthdayDateAttribute()
    {
        // 生年月日を設定(yyyy年MM月DD日)
        if($this->birthday) {
            return mb_substr($this->birthday, 0, 4).'年'.mb_substr($this->birthday, 4, 2).'月'.mb_substr($this->birthday, 6, 2).'日';
        }
        return false;
    }
}
