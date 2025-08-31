<?php

namespace Tests\Feature\Admin;

use App\Models\Player;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Http\JsonResponse;

class PlayerControllerTest extends TestCase
{
    // protected function setUp(): void
    // {
    //     parent::setUp();
    //     $this->artisan('migrate', ['--database' => 'mysql']);
    // }

    // /**
    //  * indexメソッドのテスト - 成功パターン
    //  */
    // public function test_プレイヤー一覧取得_ページネーション_成功()
    // {
    //     // 準備
    //     Player::factory()->count(25)->create();

    //     // 実行
    //     $response = $this->getJson('/api/admin/players?per_page=10');

    //     // 検証
    //     $response->assertStatus(JsonResponse::HTTP_OK)
    //             ->assertJsonStructure([
    //                 'data' => [
    //                     '*' => [
    //                         'id',
    //                         'firstname',
    //                         'lastname',
    //                         'birthday',
    //                         'height',
    //                         'weight',
    //                         'college',
    //                         'drafted_team',
    //                         'drafted_round',
    //                         'drafted_rank',
    //                         'drafted_year',
    //                         'image_file',
    //                         'created_at',
    //                         'updated_at'
    //                     ]
    //                 ],
    //                 'meta' => [
    //                     'current_page',
    //                     'per_page',
    //                     'total',
    //                     'last_page',
    //                     'from',
    //                     'to'
    //                 ],
    //                 'status',
    //                 'message'
    //             ]);
        
    //     $this->assertEquals(10, count($response->json('data')));
    //     $this->assertEquals(25, $response->json('meta.total'));
    // }

    // /**
    //  * storeメソッドのテスト - 成功パターン
    //  */
    // public function test_プレイヤー作成_成功()
    // {
    //     // 準備
    //     $playerData = [
    //         'firstname' => 'John',
    //         'lastname' => 'Doe',
    //         'birthday' => '19901225',
    //         'height' => 180.5,
    //         'weight' => 80.2,
    //         'college' => 'Test University',
    //         'drafted_team' => 'Test Team',
    //         'drafted_round' => '1st',
    //         'drafted_rank' => '5th',
    //         'drafted_year' => 2020,
    //         'image_file' => 'test.jpg'
    //     ];

    //     // Act
    //     $response = $this->postJson('/api/admin/players', $playerData);

    //     // Assert
    //     $response->assertStatus(JsonResponse::HTTP_CREATED)
    //             ->assertJsonStructure([
    //                 'data' => [
    //                     'id',
    //                     'firstname',
    //                     'lastname',
    //                     'birthday',
    //                     'height',
    //                     'weight',
    //                     'college',
    //                     'drafted_team',
    //                     'drafted_round',
    //                     'drafted_rank',
    //                     'drafted_year',
    //                     'image_file',
    //                     'created_at',
    //                     'updated_at'
    //                 ],
    //                 'status',
    //                 'message'
    //             ]);

    //     $this->assertEquals('John', $response->json('data.firstname'));
    //     $this->assertEquals('Doe', $response->json('data.lastname'));
    //     $this->assertDatabaseHas('players', [
    //         'firstname' => 'John',
    //         'lastname' => 'Doe',
    //         'birthday' => '19901225'
    //     ]);
    // }

    // /**
    //  * storeメソッドのテスト - バリデーションエラーパターン
    //  */
    // public function test_プレイヤー作成_バリデーションエラー()
    // {
    //     // 準備
    //     $invalidData = [
    //         'firstname' => '',
    //         'lastname' => '',
    //         'birthday' => '1990-12-25', // Invalid format
    //         'height' => 'invalid',
    //         'weight' => -10,
    //         'drafted_year' => 1800
    //     ];

    //     // 実行
    //     $response = $this->postJson('/api/admin/players', $invalidData);

    //     // 検証
    //     $response->assertStatus(JsonResponse::HTTP_UNPROCESSABLE_ENTITY)
    //             ->assertJsonStructure([
    //                 'error_messages',
    //                 'status'
    //             ]);
    // }

    // /**
    //  * showメソッドのテスト - 成功パターン
    //  */
    // public function test_プレイヤー詳細取得_成功()
    // {
    //     // 準備
    //     $player = Player::factory()->create([
    //         'firstname' => 'John',
    //         'lastname' => 'Doe',
    //         'birthday' => '19901225'
    //     ]);

    //     // 実行
    //     $response = $this->getJson("/api/admin/players/{$player->id}");

    //     // 検証
    //     $response->assertStatus(JsonResponse::HTTP_OK)
    //             ->assertJsonStructure([
    //                 'data' => [
    //                     'id',
    //                     'firstname',
    //                     'lastname',
    //                     'birthday',
    //                     'height',
    //                     'weight',
    //                     'college',
    //                     'drafted_team',
    //                     'drafted_round',
    //                     'drafted_rank',
    //                     'drafted_year',
    //                     'image_file',
    //                     'created_at',
    //                     'updated_at'
    //                 ],
    //                 'status',
    //                 'message'
    //             ]);

    //     $this->assertEquals($player->id, $response->json('data.id'));
    //     $this->assertEquals('John', $response->json('data.firstname'));
    // }

    // /**
    //  * showメソッドのテスト - 見つからない場合
    //  */
    // public function test_プレイヤー詳細取得_見つからない()
    // {
    //     // 実行
    //     $response = $this->getJson('/api/admin/players/999');

    //     // 検証
    //     $response->assertStatus(JsonResponse::HTTP_NOT_FOUND)
    //             ->assertJsonStructure([
    //                 'error_messages',
    //                 'status'
    //             ]);
    // }

    // /**
    //  * updateメソッドのテスト - 成功パターン
    //  */
    // public function test_プレイヤー更新_成功()
    // {
    //     // 準備
    //     $player = Player::factory()->create([
    //         'firstname' => 'John',
    //         'lastname' => 'Doe'
    //     ]);

    //     $updateData = [
    //         'firstname' => 'Jane',
    //         'lastname' => 'Smith',
    //         'height' => 175.0
    //     ];

    //     // 実行
    //     $response = $this->putJson("/api/admin/players/{$player->id}", $updateData);

    //     // 検証
    //     $response->assertStatus(JsonResponse::HTTP_OK)
    //             ->assertJsonStructure([
    //                 'data' => [
    //                     'id',
    //                     'firstname',
    //                     'lastname',
    //                     'birthday',
    //                     'height',
    //                     'weight',
    //                     'college',
    //                     'drafted_team',
    //                     'drafted_round',
    //                     'drafted_rank',
    //                     'drafted_year',
    //                     'image_file',
    //                     'created_at',
    //                     'updated_at'
    //                 ],
    //                 'status',
    //                 'message'
    //             ]);

    //     $this->assertEquals('Jane', $response->json('data.firstname'));
    //     $this->assertEquals('Smith', $response->json('data.lastname'));
    //     $this->assertEquals(175.0, $response->json('data.height'));
        
    //     $this->assertDatabaseHas('players', [
    //         'id' => $player->id,
    //         'firstname' => 'Jane',
    //         'lastname' => 'Smith',
    //         'height' => 175.0
    //     ]);
    // }

    // /**
    //  * updateメソッドのテスト - 見つからない場合
    //  */
    // public function test_プレイヤー更新_見つからない()
    // {
    //     // 準備
    //     $updateData = [
    //         'firstname' => 'Jane',
    //         'lastname' => 'Smith'
    //     ];

    //     // 実行
    //     $response = $this->putJson('/api/admin/players/999', $updateData);

    //     // 検証
    //     $response->assertStatus(JsonResponse::HTTP_NOT_FOUND)
    //             ->assertJsonStructure([
    //                 'error_messages',
    //                 'status'
    //             ]);
    // }

    // /**
    //  * updateメソッドのテスト - バリデーションエラーパターン
    //  */
    // public function test_プレイヤー更新_バリデーションエラー()
    // {
    //     // 準備
    //     $player = Player::factory()->create();
    //     $invalidData = [
    //         'firstname' => '',
    //         'birthday' => 'invalid-date',
    //         'height' => 'invalid'
    //     ];

    //     // 実行
    //     $response = $this->putJson("/api/admin/players/{$player->id}", $invalidData);

    //     // 検証
    //     $response->assertStatus(JsonResponse::HTTP_UNPROCESSABLE_ENTITY)
    //             ->assertJsonStructure([
    //                 'error_messages',
    //                 'status'
    //             ]);
    // }

    // /**
    //  * destroyメソッドのテスト - 成功パターン
    //  */
    // public function test_プレイヤー削除_成功()
    // {
    //     // 準備
    //     $player = Player::factory()->create();

    //     // 実行
    //     $response = $this->deleteJson("/api/admin/players/{$player->id}");

    //     // 検証
    //     $response->assertStatus(JsonResponse::HTTP_OK)
    //             ->assertJsonStructure([
    //                 'status',
    //                 'message'
    //             ]);

    //     $this->assertDatabaseMissing('players', [
    //         'id' => $player->id
    //     ]);
    // }

    // /**
    //  * destroyメソッドのテスト - 見つからない場合
    //  */
    // public function test_プレイヤー削除_見つからない()
    // {
    //     // 実行
    //     $response = $this->deleteJson('/api/admin/players/999');

    //     // 検証
    //     $response->assertStatus(JsonResponse::HTTP_NOT_FOUND)
    //             ->assertJsonStructure([
    //                 'error_messages',
    //                 'status'
    //             ]);
    // }
}