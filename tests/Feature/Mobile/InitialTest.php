<?php

namespace Tests\Feature\Mobile;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use Tests\TestCase;
use InvalidArgumentException;

class InitialTest extends TestCase
{
    private int $id = 1;

    /**
     * @test
     */
    public function ログインユーザの設定値取得失敗_リクエストされたユーザIDがログインIDと一致しない場合()
    {
        // 引数の例外処理を予測
        // $this->expectException(InvalidArgumentException::class);

        // ログイン処理
        $user = User::find($this->id);
        $this->actingAs($user);

        // ログイン中のユーザIDとは異なるユーザIDの情報をリクエストした場合
        $response = $this->get('/api/initials/999/info');
        // システムエラーのステータスコードを返す
        $response
            ->assertStatus(config('const.ServerError'))
            ->assertJson([
                'status'            => config('const.ServerError'),
                'message'    => [config('const.SystemMessage.UNEXPECTED_ERR')]
            ]);
    }

    /**
     * @test
     */
    public function ログインユーザの設定値取得成功()
    {
        // ログイン処理
        $user = User::find($this->id);
        $this->actingAs($user);

        // ログイン中のユーザIDとは異なるユーザIDの情報をリクエストした場合
        $response = $this->get('/api/initials/'.$this->id.'/info');
        // システムエラーのステータスコードを返す
        $response
            ->assertStatus(config('const.Success'))
            ->assertJson([
                'status'        => config('const.Success'),
                'message'       => null
            ]);
    }
}
