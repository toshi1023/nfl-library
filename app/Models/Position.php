<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    /**
     * rostersテーブルと1対多のリレーション構築(1側の設定)
     */
    public function posRosters()
    {
        return $this->hasMany('App\Models\Roster');
    }

    /**
     * pf_relationsテーブルと1対多のリレーション構築(1側の設定)
     */
    public function posPfRelations()
    {
        return $this->hasMany('App\Models\PfRelation');
    }
}
