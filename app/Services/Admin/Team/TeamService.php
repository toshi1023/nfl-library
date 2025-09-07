<?php

namespace App\Services\Admin\Team;

use App\Repositories\BaseRepositoryInterface;
use App\Services\Admin\Team\TeamServiceInterface;
use App\Services\BaseService;
use Exception;
use InvalidArgumentException;

class TeamService extends BaseService implements TeamServiceInterface
{
    public function __construct(private BaseRepositoryInterface $repository) {}

    /**
     * 全チーム取得
     */
    public function getAllTeams(array $params = []) : array
    {
        $teams = $this->repository->adminTeamRepository()->getAllTeams();
        return $this->wrapperResponse([
            'teams' => $teams
        ]);
    }

    /**
     * ページネーション付きチーム取得
     */
    public function getPaginatedTeams(int $perPage = 15, array $params = []) : array
    {
        if ($perPage <= 0) throw new InvalidArgumentException('ページサイズは1以上である必要があります');

        $teams = $this->repository->adminTeamRepository()->getPaginatedTeams($perPage, $params);
        return $this->wrapperResponse([
            'teams' => $teams
        ]);
    }

    /**
     * ID指定でチーム取得
     */
    public function getTeamById(int $id) : array
    {
        if (!$id) throw new InvalidArgumentException('チームIDが無効です');

        $team = $this->repository->adminTeamRepository()->getTeamById($id);
        if (!$team) {
            return [
                'error_messages' => ['指定されたチームが見つかりません'],
                'status' => config('const.NotFound')
            ];
        }

        return $this->wrapperResponse([
            'team' => $team
        ]);
    }

    /**
     * チーム新規作成
     */
    public function createTeam(array $data) : array
    {
        $team = $this->repository->adminTeamRepository()->createTeam($data);
        return $this->wrapperResponse([
            'team' => $team
        ], null, 'チームが正常に作成されました');
    }

    /**
     * チーム更新
     */
    public function updateTeam(int $id, array $data) : array
    {
        if (!$id) throw new InvalidArgumentException('チームIDが無効です');

        $team = $this->repository->adminTeamRepository()->getTeamById($id);
        if (!$team) {
            return [
                'error_messages' => ['指定されたチームが見つかりません'],
                'status' => config('const.NotFound')
            ];
        }

        $updatedTeam = $this->repository->adminTeamRepository()->updateTeam($id, $data);
        return $this->wrapperResponse([
            'team' => $updatedTeam
        ], null, 'チームが正常に更新されました');
    }

    /**
     * チーム削除
     */
    public function deleteTeam(int $id) : array
    {
        if (!$id) throw new InvalidArgumentException('チームIDが無効です');

        $team = $this->repository->adminTeamRepository()->getTeamById($id);
        if (!$team) {
            return [
                'error_messages' => ['指定されたチームが見つかりません'],
                'status' => config('const.NotFound')
            ];
        }

        $this->repository->adminTeamRepository()->deleteTeam($id);
        return $this->wrapperResponse([], null, 'チームが正常に削除されました');
    }
}