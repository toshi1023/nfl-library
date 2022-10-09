<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use InvalidArgumentException;
use Exception;

class Roster extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * シーズンで絞り込み
     */
    public function scopeSeason($query, int $season)
    {
        if(!$season) throw new InvalidArgumentException('シーズンが無効な値のため検索に失敗しました');

        $query->where('season', $season);
    }
    /**
     * チームで絞り込み
     */
    public function scopeTeam($query, int $team_id)
    {
        if(!$team_id) throw new InvalidArgumentException('チームが無効な値のため検索に失敗しました');

        $query->where('team_id', $team_id);
    }

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
        return $this->belongsTo('App\Models\Starter', 'id', 'roster_id');
    }
}
