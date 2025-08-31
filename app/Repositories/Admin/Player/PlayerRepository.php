<?php

namespace App\Repositories\Admin\Player;

use App\Models\Player;
use App\Repositories\BaseRepository;
use App\Repositories\Admin\Player\PlayerRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class PlayerRepository extends BaseRepository implements PlayerRepositoryInterface
{
    /**
     * 全プレイヤーを取得
     */
    public function getAllPlayers(array $params = []) : Collection
    {
        return $this->player()
        ->when(array_key_exists('drafted_year', $params) && isset($params['drafted_year']), 
            function ($query) use ($params) {
                $query->where('drafted_year', $params['drafted_year']);
            })
        ->when(array_key_exists('drafted_round', $params) && isset($params['drafted_round']),
            function ($query) use ($params) {
                $query->where('drafted_round', $params['drafted_round']);
            })
        // キーワード検索
        ->when(array_key_exists('keyword', $params) && isset($params['keyword']),
            function ($query) use ($params) {
                $keyword = $params['keyword'];
                logger()->info('Search Keyword: ' . $keyword);
                $query->where(function ($q) use ($keyword) {
                    $q->where('firstname', 'like', "%{$keyword}%")
                      ->orWhere('lastname', 'like', "%{$keyword}%")
                      ->orWhere('college', 'like', "%{$keyword}%")
                      ->orWhere('drafted_team', 'like', "%{$keyword}%");
                });
            })
        ->orderBy('id', 'desc')
        ->get();
    }

    /**
     * プレイヤーをページネーションで取得
     */
    public function getPaginatedPlayers(int $perPage = 15, array $params = []) : LengthAwarePaginator
    {
        return $this->player()
        ->when(array_key_exists('drafted_year', $params) && isset($params['drafted_year']), 
            function ($query) use ($params) {
                $query->where('drafted_year', $params['drafted_year']);
            })
        ->when(array_key_exists('drafted_round', $params) && isset($params['drafted_round']),
            function ($query) use ($params) {
                $query->where('drafted_round', $params['drafted_round']);
            })
        // キーワード検索
        ->when(array_key_exists('keyword', $params) && isset($params['keyword']),
            function ($query) use ($params) {
                $keyword = $params['keyword'];
                logger()->info('Search Keyword: ' . $keyword);
                $query->where(function ($q) use ($keyword) {
                    $q->where('firstname', 'like', "%{$keyword}%")
                      ->orWhere('lastname', 'like', "%{$keyword}%")
                      ->orWhere('college', 'like', "%{$keyword}%")
                      ->orWhere('drafted_team', 'like', "%{$keyword}%");
                });
            })
        ->orderBy('id', 'desc')
        ->paginate($perPage);
    }

    /**
     * IDでプレイヤーを取得
     */
    public function getPlayerById(int $id) : ?Player
    {
        return $this->player()->find($id);
    }

    /**
     * プレイヤーを作成
     */
    public function createPlayer(array $data) : Player
    {
        return $this->player()->create($data);
    }

    /**
     * プレイヤーを更新
     */
    public function updatePlayer(int $id, array $data) : Player
    {
        return $this->updateWithTap(
            $this->player()->find('id', $id), 
            $data
        );
    }

    /**
     * プレイヤーを削除
     */
    public function deletePlayer(int $id) : bool
    {
        return $this->player()->where('id', $id)->delete();
    }
}