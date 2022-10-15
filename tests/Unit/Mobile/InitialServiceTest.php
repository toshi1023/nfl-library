<?php

namespace Tests\Unit\Mobile;

use Tests\TestCase;
use App\Services\Mobile\Initial\InitialServiceInterface;
use App\Services\Mobile\Initial\InitialService;
use App\Repositories\Mobile\User\UserRepository;
use App\Models\User;
use InvalidArgumentException;

class InitialServiceTest extends TestCase
{
    private InitialServiceInterface $service;
    private int $id = 1;

    /**
     * テストの前処理を実行
     */
    public function setUp() : void
    {
        parent::setUp();
        $this->service = new InitialService(new UserRepository());
    }

    /**
     * @test
     */
    public function getAccountInfoの失敗動作_検索条件が無効な値の場合()
    {
        // 引数の例外処理を予測
        $this->expectException(InvalidArgumentException::class);

        // 検索条件が無効な値の場合
        $this->service->getAccountInfo(0);
    }

    /**
     * @test
     */
    public function getAccountInfoの成功動作()
    {
        // DBに存在する検索条件を渡す
        $data = $this->service->getAccountInfo($this->id);
        // statusは成功ステータスを返す
        $this->assertEquals($data['status'], config('const.Success'));
        // messageは空のデータを返す
        $this->assertNull($data['message']);
        // データはUserクラスを返す
        $this->assertInstanceOf(User::class, $data['user']);
    }
}
