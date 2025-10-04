<?php

namespace Tests\Unit\Mobile;

use Tests\TestCase;
use App\Services\Mobile\Auth\AuthServiceInterface;
use App\Services\Mobile\Auth\AuthService;
use App\Repositories\BaseRepository;
use App\Models\User;
use InvalidArgumentException;

class AuthServiceTest extends TestCase
{
    private AuthServiceInterface $service;
    private int $id = 1;

    /**
     * テストの前処理を実行
     */
    public function setUp() : void
    {
        parent::setUp();
        $this->service = new AuthService(new BaseRepository());
    }

    /**
     * @test
     */
    public function loginメソッドの失敗処理を確認_認証情報の不一致()
    {
        // DBに存在しないユーザの情報でログインを実施
        $credentials = [
            "email"     => 'test@xxx.co.jp',
            "password"  => 'test',
        ];
        $data = $this->service->login($credentials);

        // statusは認証エラーのステータスを返す
        $this->assertEquals($data['status'], config('const.Unauthorized'));
        // messageは認証失敗に応じたメッセージを返す
        $this->assertEquals($data['message'], config('const.SystemMessage.LOGIN_ERR'));
    }

    /**
     * @test
     */
    public function loginメソッドの失敗処理を確認_パラメーターの欠如()
    {
        // 引数の例外処理を予測
        $this->expectException(InvalidArgumentException::class);

        // メールアドレスが欠けた状態でログインを実施
        $credentials = [
            "password"  => 'test'
        ];
        $data = $this->service->login($credentials);

        // statusはサーバーエラーステータスを返す
        $this->assertEquals($data['status'], config('const.ServerError'));
        // メッセージはシステムエラーメッセージを配列形式で返す
        $this->assertEquals($data['message'], config('const.SystemMessage.UNEXPECTED_ERR'));
        $this->assertEquals($data['data']['details']['message'], 'メールアドレスが無効な値のため検索に失敗しました');

        // パスワードが欠けた状態でログインを実施
        $credentials = [
            "email"     => 'test@xxx.co.jp'
        ];
        $data = $this->service->login($credentials);

        // statusはサーバーエラーステータスを返す
        $this->assertEquals($data['status'], config('const.ServerError'));
        // メッセージはシステムエラーメッセージを配列形式で返す
        $this->assertEquals($data['message'], config('const.SystemMessage.UNEXPECTED_ERR'));
        $this->assertEquals($data['data']['details']['message'], 'パスワードが無効な値のため検索に失敗しました');
    }

    /**
     * @test
     */
    public function loginメソッドの成功処理を確認()
    {
        // DBに存在するユーザの情報でログインを実施
        $credentials = [
            "email"     => config('const.RootMailAddress'),
            "password"  => config('const.RootPassword'),
        ];
        $data = $this->service->login($credentials);

        // statusは成功のステータスを返す
        $this->assertEquals($data['status'], config('const.Success'));
        // messageは認証成功に応じたメッセージを返す
        $this->assertEquals($data['message'], config('const.SystemMessage.LOGIN_INFO'));
        // tokenが含まれていることを確認
        $this->assertNotNull($data['data']['token']);

        // 指定したユーザがログイン済みの状態か確認
        $user = User::find($this->id);
        $this->assertAuthenticatedAs($user);
    }

    /**
     * @test
     */
    public function すでにログアウト済みの場合のlogoutメソッドの処理を確認()
    {
        // ログアウト処理実行
        $data = $this->service->logout();

        // statusは成功のステータスを返す
        $this->assertEquals($data['status'], config('const.Success'));
        // messageはすでにログアウト済みの状態に応じたメッセージを返す
        $this->assertEquals($data['message'], config('const.SystemMessage.CHECK_ERR'));
    }

    /**
     * @test
     */
    public function logoutメソッドの成功処理を確認()
    {
        // ログイン処理
        $user = User::find($this->id);
        $this->actingAs($user);
        
        // ログアウト処理実行
        $data = $this->service->logout();

        // statusは成功のステータスを返す
        $this->assertEquals($data['status'], config('const.Success'));
        // messageはログアウト成功に応じたメッセージを返す
        $this->assertEquals($data['message'], config('const.SystemMessage.LOGOUT_INFO'));
    }
}
