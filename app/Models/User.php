<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'favorite_season',
        'favorite_team'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * メールアドレスで絞り込み
     */
    public function scopeEmail($query, string $email)
    {
        if(is_null($email)) throw new InvalidArgumentException('メールアドレスがnullのため検索に失敗しました');

        $query->where('email', $email);
    }

    /**
     * teamsテーブルと1対多のリレーション構築(1側の設定)
     */
    public function team()
    {
        return $this->belongsTo('App\Models\Team', 'favorite_team', 'id')
                    ->select('id', 'city', 'name', 'image_file', 'back_image_file');
    }

    /**
     * settingsテーブルと1対多のリレーション構築(多側の設定)
     */
    public function setting()
    {
        return $this->hasMany('App\Models\Setting', 'user_id', 'id');
    }
}
