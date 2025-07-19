<?php

namespace App\Services\Admin\Player;

use App\Repositories\BaseRepositoryInterface;
use App\Services\BaseService;
use App\Services\Admin\Player\PlayerServiceInterface;
use InvalidArgumentException;

class PlayerService extends BaseService implements PlayerServiceInterface
{
    public function __construct(private BaseRepositoryInterface $repository) {}

    /**
     * 全プレイヤーを取得
     */
    public function getAllPlayers() : array
    {
        // 値チェック
        if (!$this->repository) throw new InvalidArgumentException('リポジトリが設定されていません');
        
        return $this->wrapperResponse([
            'players' => $this->repository->adminPlayerRepository()->getAllPlayers()
        ]);
    }

    /**
     * プレイヤーをページネーションで取得
     */
    public function getPaginatedPlayers(int $perPage = 15) : array
    {
        // 値チェック
        if ($perPage <= 0) throw new InvalidArgumentException('ページサイズは1以上である必要があります');
        
        return $this->wrapperResponse([
            'players' => $this->repository->adminPlayerRepository()->getPaginatedPlayers($perPage)
        ]);
    }

    /**
     * IDでプレイヤーを取得
     */
    public function getPlayerById(int $id) : array
    {
        // 値チェック
        if (!$id) throw new InvalidArgumentException('プレイヤーIDが無効です');
        
        $player = $this->repository->adminPlayerRepository()->getPlayerById($id);
        if (!$player) {
            return [
                'error_messages' => ['指定されたプレイヤーが見つかりません'],
                'status' => config('const.NotFound', 'not_found')
            ];
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
        // 値チェック
        if (!$id) throw new InvalidArgumentException('プレイヤーIDが無効です');
        
        $player = $this->repository->adminPlayerRepository()->getPlayerById($id);
        if (!$player) {
            return [
                'error_messages' => ['指定されたプレイヤーが見つかりません'],
                'status' => config('const.NotFound', 'not_found')
            ];
        }
        
        $result = $this->repository->adminPlayerRepository()->updatePlayer($id, $data);
        if (!$result) {
            return [
                'error_messages' => ['プレイヤーの更新に失敗しました'],
                'status' => config('const.ValidationError', 'validation_error')
            ];
        }
        
        $updatedPlayer = $this->repository->adminPlayerRepository()->getPlayerById($id);
        return $this->wrapperResponse(['player' => $updatedPlayer], null, 'プレイヤーが正常に更新されました');
    }

    /**
     * プレイヤーを削除
     */
    public function deletePlayer(int $id) : array
    {
        // 値チェック
        if (!$id) throw new InvalidArgumentException('プレイヤーIDが無効です');
        
        $player = $this->repository->adminPlayerRepository()->getPlayerById($id);
        if (!$player) {
            return [
                'error_messages' => ['指定されたプレイヤーが見つかりません'],
                'status' => config('const.NotFound', 'not_found')
            ];
        }
        
        $result = $this->repository->adminPlayerRepository()->deletePlayer($id);
        if (!$result) {
            return [
                'error_messages' => ['プレイヤーの削除に失敗しました'],
                'status' => config('const.ValidationError', 'validation_error')
            ];
        }
        
        return $this->wrapperResponse([], null, 'プレイヤーが正常に削除されました');
    }
}