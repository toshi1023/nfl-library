<?php

namespace App\Repositories\Admin\Team;

use App\Models\Team;
use App\Repositories\Admin\Team\TeamRepositoryInterface;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class TeamRepository extends BaseRepository implements TeamRepositoryInterface
{
    /**
     * 全チーム取得
     */
    public function getAllTeams() : Collection
    {
        return $this->team()->orderBy('id', 'desc')->get();
    }

    /**
     * ページネーション付きチーム取得
     */
    public function getPaginatedTeams(int $perPage = 15, array $params = []) : LengthAwarePaginator
    {
        $query = $this->team()->orderBy('id', 'desc');

        if (isset($params['keyword']) && !empty($params['keyword'])) {
            $keyword = $params['keyword'];
            $query->where(function($q) use ($keyword) {
                $q->where('team_name', 'like', "%{$keyword}%")
                  ->orWhere('team_abbreviation', 'like', "%{$keyword}%")
                  ->orWhere('team_location', 'like', "%{$keyword}%");
            });
        }

        return $query->paginate($perPage);
    }

    /**
     * ID指定でチーム取得
     */
    public function getTeamById(int $id) : ?Team
    {
        return $this->team()->find($id);
    }

    /**
     * チーム新規作成
     */
    public function createTeam(array $data) : Team
    {
        return $this->team()->create($data);
    }

    /**
     * チーム更新
     */
    public function updateTeam(int $id, array $data) : Team
    {
        return $this->updateWithTap(
            $this->team()->find($id),
            $data
        );
    }

    /**
     * チーム削除
     */
    public function deleteTeam(int $id) : bool
    {
        return $this->team()->where('id', $id)->delete();
    }
}