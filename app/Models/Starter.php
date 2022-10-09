<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Starter extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    /**
     * rostersテーブルと1対1のリレーション構築
     */
    public function starterRoster()
    {
       return $this->hasOne('App\Models\Roster');
    }
}
