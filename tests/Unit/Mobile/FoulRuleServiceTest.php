<?php

namespace Tests\Unit\Mobile;

use App\Models\FoulRule;
use Illuminate\Database\Eloquent\Collection;
use App\Repositories\BaseRepository;
use App\Services\Mobile\FoulRule\FoulRuleService;
use App\Services\Mobile\FoulRule\FoulRuleServiceInterface;
use Tests\TestCase;

class FoulRuleServiceTest extends TestCase
{
    private FoulRuleServiceInterface $service;

    /**
     * テストの前処理を実行
     */
    public function setUp() : void
    {
        parent::setUp();
        $this->service = new FoulRuleService(new BaseRepository());
    }

    /**
     * @test
     */
    public function getFoulRuleInfoの成功動作()
    {
        // 全件取得
        $data = $this->service->getFoulRuleInfo(null, null);
        // statusは成功ステータスを返す
        $this->assertEquals($data['status'], config('const.Success'));
        // messageは空のデータを返す
        $this->assertNull($data['message']);
        // データはCollectionクラスを返す
        $this->assertInstanceOf(Collection::class, $data['penalties']);
        // データ1件ずつにFoulRuleクラスの型を返す
        foreach($data['penalties'] as $val) {
            $this->assertInstanceOf(FoulRule::class, $val);
        }

        // DBに存在する検索条件を渡す
        $data = $this->service->getFoulRuleInfo(1, 10);
        // statusは成功ステータスを返す
        $this->assertEquals($data['status'], config('const.Success'));
        // messageは空のデータを返す
        $this->assertNull($data['message']);
        // データはCollectionクラスを返す
        $this->assertInstanceOf(Collection::class, $data['penalties']);
        // データ1件ずつにFoulRuleクラスの型を返す
        foreach($data['penalties'] as $val) {
            $this->assertInstanceOf(FoulRule::class, $val);
        }
    }

    /**
     * @test
     */
    public function getFoulRuleInfoの失敗動作_存在しない検索値の場合()
    {
        // DBに存在しない検索条件を渡す
        $data = $this->service->getFoulRuleInfo(1, 100);
        // statusは成功ステータスを返す
        $this->assertEquals($data['status'], config('const.Success'));
        // データは空の配列を返す
        $this->assertEmpty($data['penalties']);
    }

    /**
     * @test
     */
    public function getFoulRuleInfoの失敗動作_検索値が無効な場合()
    {
        // 攻守ステータスの検索条件が無効な値の場合
        $status_type = 2;
        $yard_info = 5;
        $data = $this->service->getFoulRuleInfo($status_type, $yard_info);

        // statusはサーバーエラーステータスを返す
        $this->assertEquals($data['status'], config('const.ServerError'));
        // メッセージはシステムエラーメッセージを配列形式で返す
        $this->assertEquals($data['error_messages'], [config('const.SystemMessage.UNEXPECTED_ERR')]);
        $this->assertEquals($data['details']['message'], '攻守ステータスの検索値が無効な値のため検索に失敗しました');

        // 罰則ヤード情報の検索条件が無効な値の場合
        $status_type = 1;
        $yard_info = 0;
        $data = $this->service->getFoulRuleInfo($status_type, $yard_info);

        // statusはサーバーエラーステータスを返す
        $this->assertEquals($data['status'], config('const.ServerError'));
        // メッセージはシステムエラーメッセージを配列形式で返す
        $this->assertEquals($data['error_messages'], [config('const.SystemMessage.UNEXPECTED_ERR')]);
        $this->assertEquals($data['details']['message'], '罰則ヤード情報の検索値が無効な値のため検索に失敗しました');
    }
}
