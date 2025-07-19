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
    public function getAllPlayers() : Collection
    {
        return $this->player()->orderBy('id', 'desc')->get();
    }

    /**
     * プレイヤーをページネーションで取得
     */
    public function getPaginatedPlayers(int $perPage = 15) : LengthAwarePaginator
    {
        return $this->player()->orderBy('id', 'desc')->paginate($perPage);
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
    public function updatePlayer(int $id, array $data) : bool
    {
        return $this->player()->where('id', $id)->update($data);
    }

    /**
     * プレイヤーを削除
     */
    public function deletePlayer(int $id) : bool
    {
        return $this->player()->where('id', $id)->delete();
    }
}