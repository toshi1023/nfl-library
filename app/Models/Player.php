<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'height' => 'double',
        'weight' => 'double'
    ];

    /**
     * アクセサ許可リスト
     */
    protected $appends = ['birthday_year', 'birthday_date', 'image_url'];
    
    /**
     * 生年月日の年を取得(年齢算出に使用)
     */
    public function getBirthdayYearAttribute()
    {
        // 生年月日を設定(yyyy年MM月DD日)
        if($this->birthday) {
            return (int)mb_substr($this->birthday, 0, 4);
        }
        return null;
    }

    /**
     * 生年月日を取得
     */
    public function getBirthdayDateAttribute()
    {
        // 生年月日を設定(yyyy年MM月DD日)
        if($this->birthday) {
            return mb_substr($this->birthday, 0, 4).'年'.mb_substr($this->birthday, 4, 2).'月'.mb_substr($this->birthday, 6, 2).'日';
        }
        return null;
    }

    /**
     * 画像のパスを取得
     */
    public function getImageUrlAttribute()
    {
        // 画像パスを設定
        if($this->image_file) {
            return config('const.Aws.Url').'/'.config('const.Aws.Player').'/'.$this->id.'/'.$this->image_file;
        }
        return config('const.Aws.Url').'/no-image.jpg';
    }

    /**
     * rostersテーブルと1対多のリレーション構築(1側の設定)
     */
    public function playRosters()
    {
        return $this->hasMany('App\Models\Roster');
    }
}
