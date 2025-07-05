<?php

namespace Tests\Unit\Mobile;

use App\Models\Roster;
use App\Models\Team;
use App\Repositories\BaseRepository;
use App\Services\Mobile\Search\SearchService;
use App\Services\Mobile\Search\SearchServiceInterface;
use Illuminate\Database\Eloquent\Collection;
use Tests\TestCase;


class SearchServiceTest extends TestCase
{
    private SearchServiceInterface $service;

    /**
     * テストの前処理を実行
     */
    public function setUp() : void
    {
        parent::setUp();
        $this->service = new SearchService(new BaseRepository());
    }

    /**
     * @test
     */
    public function getTeamListの成功動作()
    {
        // DBに存在する検索条件を渡す
        $data = $this->service->getTeamList();
        // statusは成功ステータスを返す
        $this->assertEquals($data['status'], config('const.Success'));
        // messageは空のデータを返す
        $this->assertNull($data['message']);
        // データはCollectionクラスを返す
        $this->assertInstanceOf(Collection::class, $data['data']['teams']);
        // データ1件ずつにRosterクラスの型を返す
        foreach($data['data']['teams'] as $val) {
            $this->assertInstanceOf(Team::class, $val);
        }
    }

    /**
     * @test
     */
    public function getSeasonListの成功動作()
    {
        // DBに存在する検索条件を渡す
        $data = $this->service->getSeasonList();
        // statusは成功ステータスを返す
        $this->assertEquals($data['status'], config('const.Success'));
        // messageは空のデータを返す
        $this->assertNull($data['message']);
        // データはCollectionクラスを返す
        $this->assertInstanceOf(Collection::class, $data['data']['seasons']);
        // データ1件ずつにRosterクラスの型を返す
        foreach($data['data']['seasons'] as $val) {
            $this->assertInstanceOf(Roster::class, $val);
        }
    }
}
