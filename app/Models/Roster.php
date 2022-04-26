<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roster extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * teamsテーブルと1対多のリレーション構築(多側の設定)
     */
    public function team()
    {
        return $this->belongsTo('App\Models\Team', 'team_id', 'id');
    }
    /**
     * playersテーブルと1対多のリレーション構築(多側の設定)
     */
    public function player()
    {
        return $this->belongsTo('App\Models\Player', 'player_id', 'id');
    }
    /**
     * positionsテーブルと1対多のリレーション構築(多側の設定)
     */
    public function position()
    {
        return $this->belongsTo('App\Models\Position', 'position_id', 'id');
    }

    /**
     * startersテーブルと1対1のリレーション構築
     */
    public function rosterStarter()
    {
        return $this->belongsTo('App\Models\Starter');
    }
}
