<?php

namespace Tests\Unit\Admin;

use App\Models\Player;
use App\Repositories\BaseRepository;
use App\Services\Admin\Player\PlayerService;
use Tests\TestCase;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class PlayerServiceTest extends TestCase
{
    private $base;
    private $playerService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->playerService = new PlayerService(new BaseRepository());
    }

    /**
     * getAllPlayersメソッドのテスト - 成功パターン
     */
    public function test_全プレイヤー取得_成功()
    {
        // 準備
        $players = Player::get();

        // 実行
        $result = $this->playerService->getAllPlayers();

        // 検証
        $this->assertIsArray($result);
        $this->assertArrayHasKey('data', $result);
        $this->assertArrayHasKey('players', $result['data']);
        $this->assertArrayHasKey('status', $result);
        $this->assertEquals(config('const.Success'), $result['status']);
        // 完全に中身の一致は難しいため、件数だけでも比較
        $this->assertEquals($players->count(), count($result['data']['players']));
    }

    /**
     * Test getPaginatedPlayers method - success case
     */
    public function test_ページネーションでの取得_成功()
    {
        // Arrange
        $players = new Collection([
            new Player(['id' => 1, 'firstname' => 'John', 'lastname' => 'Doe'])
        ]);
        $paginator = new LengthAwarePaginator(
            $players,
            25,
            15,
            1,
            ['path' => '/api/admin/players']
        );

        $this->playerRepository->shouldReceive('getPaginatedPlayers')
            ->once()
            ->with(15)
            ->andReturn($paginator);

        // Act
        $result = $this->playerService->getPaginatedPlayers(15);

        // Assert
        $this->assertIsArray($result);
        $this->assertArrayHasKey('data', $result);
        $this->assertArrayHasKey('players', $result['data']);
        $this->assertArrayHasKey('status', $result);
        $this->assertEquals(config('const.Success'), $result['status']);
        $this->assertEquals($paginator, $result['data']['players']);
    }

    // /**
    //  * Test getPaginatedPlayers method - invalid per_page case
    //  */
    // public function test_get_paginated_players_throws_exception_for_invalid_per_page()
    // {
    //     // Act
    //     $result = $this->playerService->getPaginatedPlayers(0);

    //     // Assert
    //     $this->assertIsArray($result);
    //     $this->assertArrayHasKey('error_messages', $result);
    //     $this->assertArrayHasKey('status', $result);
    //     $this->assertEquals(config('const.ServerError'), $result['status']);
    // }

    // /**
    //  * Test getPlayerById method - success case
    //  */
    // public function test_get_player_by_id_returns_success_response()
    // {
    //     // Arrange
    //     $player = new Player(['id' => 1, 'firstname' => 'John', 'lastname' => 'Doe']);

    //     $this->playerRepository->shouldReceive('getPlayerById')
    //         ->once()
    //         ->with(1)
    //         ->andReturn($player);

    //     // Act
    //     $result = $this->playerService->getPlayerById(1);

    //     // Assert
    //     $this->assertIsArray($result);
    //     $this->assertArrayHasKey('data', $result);
    //     $this->assertArrayHasKey('player', $result['data']);
    //     $this->assertArrayHasKey('status', $result);
    //     $this->assertEquals(config('const.Success'), $result['status']);
    //     $this->assertEquals($player, $result['data']['player']);
    // }

    // /**
    //  * Test getPlayerById method - not found case
    //  */
    // public function test_get_player_by_id_returns_not_found_response()
    // {
    //     // Arrange
    //     $this->playerRepository->shouldReceive('getPlayerById')
    //         ->once()
    //         ->with(999)
    //         ->andReturn(null);

    //     // Act
    //     $result = $this->playerService->getPlayerById(999);

    //     // Assert
    //     $this->assertIsArray($result);
    //     $this->assertArrayHasKey('error_messages', $result);
    //     $this->assertArrayHasKey('status', $result);
    //     $this->assertEquals(config('const.NotFound', 'not_found'), $result['status']);
    // }

    // /**
    //  * Test getPlayerById method - invalid id case
    //  */
    // public function test_get_player_by_id_throws_exception_for_invalid_id()
    // {
    //     // Act
    //     $result = $this->playerService->getPlayerById(0);

    //     // Assert
    //     $this->assertIsArray($result);
    //     $this->assertArrayHasKey('error_messages', $result);
    //     $this->assertArrayHasKey('status', $result);
    //     $this->assertEquals(config('const.ServerError'), $result['status']);
    // }

    // /**
    //  * Test createPlayer method - success case
    //  */
    // public function test_create_player_returns_success_response()
    // {
    //     // Arrange
    //     $playerData = [
    //         'firstname' => 'John',
    //         'lastname' => 'Doe',
    //         'birthday' => '19901225'
    //     ];
    //     $player = new Player($playerData);

    //     $this->playerRepository->shouldReceive('createPlayer')
    //         ->once()
    //         ->with($playerData)
    //         ->andReturn($player);

    //     // Act
    //     $result = $this->playerService->createPlayer($playerData);

    //     // Assert
    //     $this->assertIsArray($result);
    //     $this->assertArrayHasKey('data', $result);
    //     $this->assertArrayHasKey('player', $result['data']);
    //     $this->assertArrayHasKey('status', $result);
    //     $this->assertArrayHasKey('message', $result);
    //     $this->assertEquals(config('const.Success'), $result['status']);
    //     $this->assertEquals($player, $result['data']['player']);
    //     $this->assertEquals('プレイヤーが正常に作成されました', $result['message']);
    // }

    // /**
    //  * Test createPlayer method - exception case
    //  */
    // public function test_create_player_handles_exception()
    // {
    //     // Arrange
    //     $playerData = [
    //         'firstname' => 'John',
    //         'lastname' => 'Doe',
    //         'birthday' => '19901225'
    //     ];

    //     $this->playerRepository->shouldReceive('createPlayer')
    //         ->once()
    //         ->with($playerData)
    //         ->andThrow(new Exception('Database error'));

    //     // Act
    //     $result = $this->playerService->createPlayer($playerData);

    //     // Assert
    //     $this->assertIsArray($result);
    //     $this->assertArrayHasKey('error_messages', $result);
    //     $this->assertArrayHasKey('status', $result);
    //     $this->assertEquals(config('const.ServerError'), $result['status']);
    // }

    // /**
    //  * Test updatePlayer method - success case
    //  */
    // public function test_update_player_returns_success_response()
    // {
    //     // Arrange
    //     $playerId = 1;
    //     $updateData = ['firstname' => 'Jane'];
    //     $player = new Player(['id' => $playerId, 'firstname' => 'John', 'lastname' => 'Doe']);
    //     $updatedPlayer = new Player(['id' => $playerId, 'firstname' => 'Jane', 'lastname' => 'Doe']);

    //     $this->playerRepository->shouldReceive('getPlayerById')
    //         ->once()
    //         ->with($playerId)
    //         ->andReturn($player);

    //     $this->playerRepository->shouldReceive('updatePlayer')
    //         ->once()
    //         ->with($playerId, $updateData)
    //         ->andReturn(true);

    //     $this->playerRepository->shouldReceive('getPlayerById')
    //         ->once()
    //         ->with($playerId)
    //         ->andReturn($updatedPlayer);

    //     // Act
    //     $result = $this->playerService->updatePlayer($playerId, $updateData);

    //     // Assert
    //     $this->assertIsArray($result);
    //     $this->assertArrayHasKey('data', $result);
    //     $this->assertArrayHasKey('player', $result['data']);
    //     $this->assertArrayHasKey('status', $result);
    //     $this->assertArrayHasKey('message', $result);
    //     $this->assertEquals(config('const.Success'), $result['status']);
    //     $this->assertEquals($updatedPlayer, $result['data']['player']);
    //     $this->assertEquals('プレイヤーが正常に更新されました', $result['message']);
    // }

    // /**
    //  * Test updatePlayer method - not found case
    //  */
    // public function test_update_player_returns_not_found_response()
    // {
    //     // Arrange
    //     $playerId = 999;
    //     $updateData = ['firstname' => 'Jane'];

    //     $this->playerRepository->shouldReceive('getPlayerById')
    //         ->once()
    //         ->with($playerId)
    //         ->andReturn(null);

    //     // Act
    //     $result = $this->playerService->updatePlayer($playerId, $updateData);

    //     // Assert
    //     $this->assertIsArray($result);
    //     $this->assertArrayHasKey('error_messages', $result);
    //     $this->assertArrayHasKey('status', $result);
    //     $this->assertEquals(config('const.NotFound', 'not_found'), $result['status']);
    // }

    // /**
    //  * Test deletePlayer method - success case
    //  */
    // public function test_delete_player_returns_success_response()
    // {
    //     // Arrange
    //     $playerId = 1;
    //     $player = new Player(['id' => $playerId, 'firstname' => 'John', 'lastname' => 'Doe']);

    //     $this->playerRepository->shouldReceive('getPlayerById')
    //         ->once()
    //         ->with($playerId)
    //         ->andReturn($player);

    //     $this->playerRepository->shouldReceive('deletePlayer')
    //         ->once()
    //         ->with($playerId)
    //         ->andReturn(true);

    //     // Act
    //     $result = $this->playerService->deletePlayer($playerId);

    //     // Assert
    //     $this->assertIsArray($result);
    //     $this->assertArrayHasKey('data', $result);
    //     $this->assertArrayHasKey('status', $result);
    //     $this->assertArrayHasKey('message', $result);
    //     $this->assertEquals(config('const.Success'), $result['status']);
    //     $this->assertEquals('プレイヤーが正常に削除されました', $result['message']);
    // }

    // /**
    //  * Test deletePlayer method - not found case
    //  */
    // public function test_delete_player_returns_not_found_response()
    // {
    //     // Arrange
    //     $playerId = 999;

    //     $this->playerRepository->shouldReceive('getPlayerById')
    //         ->once()
    //         ->with($playerId)
    //         ->andReturn(null);

    //     // Act
    //     $result = $this->playerService->deletePlayer($playerId);

    //     // Assert
    //     $this->assertIsArray($result);
    //     $this->assertArrayHasKey('error_messages', $result);
    //     $this->assertArrayHasKey('status', $result);
    //     $this->assertEquals(config('const.NotFound', 'not_found'), $result['status']);
    // }
}