<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    /**
     * pf_relationsテーブルと1対多のリレーション構築(1側の設定)
     */
    public function fPfRelations()
    {
        return $this->hasMany('App\Models\PfRelation');
    }

    /**
     * teamsテーブルと多対多のリレーション構築
     */
    public function formationTeams()
    {
        return $this->belongsToMany('App\Models\Team', 'tf_relations', 'formation_id')
                    ->withPivot('season', 'odflg', 'abstract_flg', 'created_at', 'updated_at');
    }
}
