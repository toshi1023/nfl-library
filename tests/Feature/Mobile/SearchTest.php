<?php

namespace Tests\Feature\Mobile;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SearchTest extends TestCase
{
    /**
     * @test
     *
     * @return void
     */
    public function チームの検索情報の取得成功()
    {
        $response = $this->get('/api/search/team/index');

        $response->assertStatus(config('const.Success'));
    }

    /**
     * @test
     *
     * @return void
     */
    public function シーズンの検索情報の取得成功()
    {
        $response = $this->get('/api/search/season/index');

        $response->assertStatus(config('const.Success'));
    }
}
