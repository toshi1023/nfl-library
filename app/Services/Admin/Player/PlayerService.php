<?php

namespace App\Services\Admin\Player;

use App\Repositories\BaseRepositoryInterface;
use App\Services\BaseService;
use App\Services\Admin\Player\PlayerServiceInterface;
use Exception;
use InvalidArgumentException;

class PlayerService extends BaseService implements PlayerServiceInterface
{
    public function __construct(private BaseRepositoryInterface $repository) {}

    /**
     * 全プレイヤーを取得
     */
    public function getAllPlayers() : array
    {   
        return $this->wrapperResponse([
            'players' => $this->repository->adminPlayerRepository()->getAllPlayers()
        ]);
    }

    /**
     * プレイヤーをページネーションで取得
     */
    public function getPaginatedPlayers(int $perPage = 15) : array
    {
        return $this->wrapperResponse([
            'players' => $this->repository->adminPlayerRepository()->getPaginatedPlayers($perPage)
        ]);
    }

    /**
     * IDでプレイヤーを取得
     */
    public function getPlayerById(int $id) : array
    {
        $player = $this->repository->adminPlayerRepository()->getPlayerById($id);
        if (!$player) {
            throw new InvalidArgumentException('指定されたプレイヤーが見つかりませんでした。プレイヤーIDが無効な可能性があります。', config('const.NotFound', 'not_found'));
        }
        
        return $this->wrapperResponse(['player' => $player]);
    }

    /**
     * プレイヤーを作成
     */
    public function createPlayer(array $data) : array
    {
        $player = $this->repository->adminPlayerRepository()->createPlayer($data);
        return $this->wrapperResponse(['player' => $player], null, 'プレイヤーが正常に作成されました');
    }

    /**
     * プレイヤーを更新
     */
    public function updatePlayer(int $id, array $data) : array
    {
        $player = $this->repository->adminPlayerRepository()->getPlayerById($id);
        if (!$player) {
            throw new InvalidArgumentException('指定されたプレイヤーが見つかりませんでした。プレイヤーIDが無効な可能性があります。', config('const.NotFound', 'not_found'));
        }
        
        $updatedPlayer = $this->repository->adminPlayerRepository()->updatePlayer($id, $data);
        return $this->wrapperResponse(['player' => $updatedPlayer], null, 'プレイヤーが正常に更新されました');
    }

    /**
     * プレイヤーを削除
     */
    public function deletePlayer(int $id) : array
    {
        $player = $this->repository->adminPlayerRepository()->getPlayerById($id);
        if (!$player) {
            throw new InvalidArgumentException('指定されたプレイヤーが見つかりませんでした。プレイヤーIDが無効な可能性があります。', config('const.NotFound', 'not_found'));
        }
        
        $result = $this->repository->adminPlayerRepository()->deletePlayer($id);
        if (!$result) {
            throw new Exception('プレイヤーの削除に失敗しました');
        }
        
        return $this->wrapperResponse([], null, 'プレイヤーが正常に削除されました');
    }
}