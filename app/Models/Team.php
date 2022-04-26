<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];

    /**
     * formationsテーブルと多対多のリレーション構築
     */
    public function teamFormations()
    {
        return $this->belongsToMany('App\Models\Formation', 'tf_relations', 'team_id')
                    ->withPivot('season', 'odflg', 'abstract_flg', 'created_at', 'updated_at');
    }
}
