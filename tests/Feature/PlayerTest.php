<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PlayerTest extends TestCase
{
    /**
     * @test
     *
     * @return void
     */
    public function ロスター・スターター情報の取得成功()
    {
        $response = $this->get('/api/players/info?season=2012&team_id=1');

        $response->assertStatus(config('const.Success'));
    }

    /**
     * @test
     *
     * @return void
     */
    public function ロスター・スターター情報の取得失敗()
    {
        // シーズンとチームの検索値を渡さない場合
        $response = $this->get('/api/players/info');
        // バリデーションエラーのステータスコードを返す
        $response->assertStatus(config('const.ValidationError'));
    }
}
