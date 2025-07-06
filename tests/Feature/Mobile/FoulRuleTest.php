<?php

namespace Tests\Feature\Mobile;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FoulRuleTest extends TestCase
{
    /**
     * @test
     *
     * @return void
     */
    public function 反則情報の取得失敗()
    {
        // シーズンとチームの検索値を渡さない場合
        $response = $this->get('/api/foul_rules/info?yard_info=string&status_type=string');
        // バリデーションエラーのステータスコードを返す
        $response
            ->assertStatus(config('const.ValidationError'))
            ->assertJson(["message" => [
                'status_type'    => ['攻守ステータスの検索値が無効な値を設定されています'],
                'yard_info'      => ['罰則ヤードの検索値が無効な値を設定されています']
            ]
        ]);
    }

    /**
     * @test
     *
     * @return void
     */
    public function 反則情報の取得成功()
    {
        $response = $this->get('/api/foul_rules/info?yard_info=10&status_type=1');

        $response->assertStatus(config('const.Success'));
    }
}
