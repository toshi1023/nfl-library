<?php

namespace Tests\Unit\Mobile;

use Tests\TestCase;
use Illuminate\Database\Eloquent\Collection;
use App\Services\Mobile\Player\PlayerServiceInterface;
use App\Services\Mobile\Player\PlayerService;
use App\Repositories\BaseRepository;
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
        $this->service = new PlayerService(new BaseRepository());
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
        $this->assertInstanceOf(Collection::class, $data['data']['rosters']);
        // データ1件ずつにRosterクラスの型を返す
        foreach($data['data']['rosters'] as $val) {
            $this->assertInstanceOf(Roster::class, $val);
        }
    }

    /**
     * @test
     */
    public function getPlayerInfoの失敗動作_存在しない検索値の場合()
    {
        // DBに存在しない検索条件を渡す
        $data = $this->service->getPlayerInfo(9999, 1);
        // statusは成功ステータスを返す
        $this->assertEquals($data['status'], config('const.Success'));
        // データは空の配列を返す
        $this->assertEmpty($data['data']['rosters']);
    }

    /**
     * @test
     */
    public function getPlayerInfoの失敗動作_検索値が無効な場合()
    {
        // 引数の例外処理を予測
        $this->expectException(InvalidArgumentException::class);
        // シーズンの検索条件が無効な値の場合
        $season = 0;
        $team_id = 1;
        $data = $this->service->getPlayerInfo($season, $team_id);

        // statusはサーバーエラーステータスを返す
        $this->assertEquals($data['status'], config('const.ServerError'));
        // メッセージはシステムエラーメッセージを配列形式で返す
        $this->assertEquals($data['message'], [config('const.SystemMessage.UNEXPECTED_ERR')]);
        $this->assertEquals($data['data']['details']['message'], 'シーズンが無効な値のため検索に失敗しました');

        // チームの検索条件が無効な値の場合
        $season = 2020;
        $team_id = 0;
        $data = $this->service->getPlayerInfo($season, $team_id);

        // statusはサーバーエラーステータスを返す
        $this->assertEquals($data['status'], config('const.ServerError'));
        // メッセージはシステムエラーメッセージを配列形式で返す
        $this->assertEquals($data['message'], [config('const.SystemMessage.UNEXPECTED_ERR')]);
        $this->assertEquals($data['data']['details']['message'], 'チームが無効な値のため検索に失敗しました');
    }
}
