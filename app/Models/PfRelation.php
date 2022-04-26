<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PfRelation extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * formationsテーブルと1対多のリレーション構築(多側の設定)
     */
    public function pfFormation()
    {
        return $this->belongsTo('App\Models\Formation', 'formation_id', 'id');
    }
}
