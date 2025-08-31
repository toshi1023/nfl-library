<?php

namespace Tests\Feature\Mobile;

use Tests\TestCase;

class PlayerTest extends TestCase
{
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
        $response
            ->assertStatus(config('const.ValidationError'))
            ->assertJson(["message" => [
                'season'    => ['シーズン は必須です'],
                'team_id'   => ['チーム は必須です']
            ]
        ]);
    }

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
}
