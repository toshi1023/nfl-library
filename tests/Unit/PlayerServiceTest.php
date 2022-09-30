<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Database\Eloquent\Collection;
use App\Services\Player\PlayerServiceInterface;
use App\Services\Player\PlayerService;
use App\Repositories\Player\PlayerRepository;
use App\Models\Roster;
use InvalidArgumentException;

class PlayerServiceTest extends TestCase
{
    private PlayerServiceInterface $service;

    /**
     * テストの前処理を実行
     */
    public function setUp() : void
    {
        parent::setUp();
        $this->service = new PlayerService(new PlayerRepository());
    }

    /**
     * @test
     */
    public function getPlayerInfoの成功動作()
    {
        // DBに存在する検索条件を渡す
        $data = $this->service->getPlayerInfo(2012, 1);
        // statusは成功ステータスを返す
        $this->assertEquals($data['status'], config('const.Success'));
        // messageは空のデータを返す
        $this->assertNull($data['message']);
        // データはCollectionクラスを返す
        $this->assertInstanceOf(Collection::class, $data['rosters']);
        // データ1件ずつにRosterクラスの型を返す
        foreach($data['rosters'] as $val) {
            $this->assertInstanceOf(Roster::class, $val);
        }
    }

    /**
     * @test
     */
    public function getPlayerInfoの失敗動作_例外処理なし()
    {
        // DBに存在しない検索条件を渡す
        $data = $this->service->getPlayerInfo(9999, 1);
        // statusは成功ステータスを返す
        $this->assertEquals($data['status'], config('const.Success'));
        // データは空の配列を返す
        $this->assertEmpty($data['rosters']);
    }

    /**
     * @test
     */
    public function getPlayerInfoの失敗動作_例外処理あり()
    {
        // 引数の例外処理を予測
        $this->expectException(InvalidArgumentException::class);

        // 検索条件が無効な値の場合
        $season = 0;
        $team_id = 0;
        $this->service->getPlayerInfo($season, $team_id);
    }
}
