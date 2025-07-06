<?php

namespace Tests\Feature\Mobile;

use Tests\TestCase;
use App\Models\User;

class AuthTest extends TestCase
{
    private int $id = 1;

    /**
     * @test
     *
     * @return void
     */
    public function ログイン失敗_情報欠如()
    {
        // メールアドレスが欠けた状態でログインを実施
        $credentials = [
            "password"  => 'test'
        ];
        $response = $this->post('/api/auth/login', $credentials);
        // 権限がない旨のエラーメッセージを取得できることを確認
        $response
            ->assertStatus(config('const.ValidationError'))
            ->assertJson(["message" => [
                    'email' => ['メールアドレス は必須です']
                ]
            ]);

        // パスワードが欠けた状態でログインを実施
        $credentials = [
            "email"  => 'test@xxx.co.jp'
        ];
        $response = $this->post('/api/auth/login', $credentials);
        // 権限がない旨のエラーメッセージを取得できることを確認
        $response
            ->assertStatus(config('const.ValidationError'))
            ->assertJson(["message" => [
                    'password' => ['パスワード は必須です']
                ]
            ]);

        // メールアドレスの形式ではない状態でログインを実施
        $credentials = [
            "email"     => 'test_address',
            "password"  => 'test'
        ];
        $response = $this->post('/api/auth/login', $credentials);
        // 権限がない旨のエラーメッセージを取得できることを確認
        $response
            ->assertStatus(config('const.ValidationError'))
            ->assertJson(["message" => [
                    'email' => ['メールアドレス の書式のみ有効です']
                ]
            ]);
    }

    /**
     * @test
     *
     * @return void
     */
    public function ログイン成功()
    {
        // DBに存在するユーザの情報でログインを実施
        $credentials = [
            "email"     => config('const.RootMailAddress'),
            "password"  => config('const.RootPassword'),
        ];
        $response = $this->post('/api/auth/login', $credentials);

        $user = User::find($this->id);

        // 正しいレスポンスが返り、ユーザ情報が取得できることを確認
        $response
            ->assertStatus(config('const.Success'))
            ->assertJson([
                'id'            => $user->id,
                'name'          => $user->name,
                'message'       => config('const.SystemMessage.LOGIN_INFO'),
                'status'        => config('const.Success')
            ]);

        $this->assertAuthenticatedAs($user);
    }

    /**
     * @test
     *
     * @return void
     */
    public function ログアウト成功()
    {
        // ログイン処理
        $user = User::find($this->id);
        $this->actingAs($user);

        $response = $this->post('/api/auth/logout');

        // 正しいレスポンスが返ることを確認
        $response
            ->assertStatus(config('const.Success'))
            ->assertJson([
                'message'       => config('const.SystemMessage.LOGOUT_INFO'),
                'status'        => config('const.Success')
            ]);
    }
}
