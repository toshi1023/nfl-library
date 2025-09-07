<?php

namespace Tests\Unit\Admin;

use App\Models\Team;
use App\Repositories\BaseRepository;
use App\Services\Admin\Team\TeamService;
use Tests\TestCase;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class TeamServiceTest extends TestCase
{
    private $base;
    private $teamService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->teamService = new TeamService(new BaseRepository());
    }

    /**
     * getAllTeamsメソッドのテスト - 成功パターン
     */
    public function test_全チーム取得_成功()
    {
        $teams = Team::get();

        $result = $this->teamService->getAllTeams();

        $this->assertIsArray($result);
        $this->assertArrayHasKey('data', $result);
        $this->assertArrayHasKey('teams', $result['data']);
        $this->assertArrayHasKey('status', $result);
        $this->assertEquals(config('const.Success'), $result['status']);
        $this->assertEquals($teams->count(), count($result['data']['teams']));
    }

    /**
     * getPaginatedTeamsメソッドのテスト - 成功パターン
     */
    public function test_ページネーションでの取得_成功()
    {
        $params = [
            'keyword' => 'Patriots',
        ];
        $teams = Team::where(function($query) use ($params) {
            $keyword = $params['keyword'];
            $query->where('team_name', 'like', "%{$keyword}%")
                  ->orWhere('team_abbreviation', 'like', "%{$keyword}%")
                  ->orWhere('team_location', 'like', "%{$keyword}%");
        })
        ->orderBy('id', 'desc')
        ->paginate();

        $result = $this->teamService->getPaginatedTeams(15, $params);

        $this->assertIsArray($result);
        $this->assertArrayHasKey('data', $result);
        $this->assertArrayHasKey('teams', $result['data']);
        $this->assertArrayHasKey('status', $result);
        $this->assertEquals(config('const.Success'), $result['status']);
        $this->assertEquals($teams->total(), $result['data']['teams']->total());
    }

    /**
     * getPaginatedTeamsメソッドのテスト - 成功パターン
     */
    public function test_ページネーションでの件数指定取得_成功()
    {
        $teams = Team::orderBy('id', 'desc')->paginate(28);

        $result = $this->teamService->getPaginatedTeams(28);

        $this->assertIsArray($result);
        $this->assertArrayHasKey('data', $result);
        $this->assertArrayHasKey('teams', $result['data']);
        $this->assertArrayHasKey('status', $result);
        $this->assertEquals(config('const.Success'), $result['status']);
        $this->assertEquals($teams->perPage(), $result['data']['teams']->perPage());
    }
}