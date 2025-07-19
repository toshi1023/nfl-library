<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePlayerRequest;
use App\Http\Requests\Admin\UpdatePlayerRequest;
use App\Http\Resources\Admin\PlayerResource;
use App\Services\Admin\Player\PlayerServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PlayerController extends Controller
{
    public function __construct(private PlayerServiceInterface $playerService) {}

    /**
     * プレイヤー一覧を表示
     */
    public function index(Request $request): PlayerResource
    {
        $perPage = $request->query('per_page', 15);
        $result = $this->playerService->getPaginatedPlayers((int)$perPage);
        
        // ページネーション情報を追加
        $result['meta'] = [
            'current_page' => $result['data']['players']->currentPage(),
            'per_page' => $result['data']['players']->perPage(),
            'total' => $result['data']['players']->total(),
            'last_page' => $result['data']['players']->lastPage(),
            'from' => $result['data']['players']->firstItem(),
            'to' => $result['data']['players']->lastItem(),
        ];
        
        return new PlayerResource($result);
    }

    /**
     * 新しいプレイヤーを保存
     */
    public function store(StorePlayerRequest $request)
    {
        $result = $this->playerService->createPlayer($request->validated());
        
        // エラーの場合は500ステータスコードを返す
        if (isset($result['error_messages'])) {
            return response()->json($result, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
        
        // 作成成功時は201ステータスコードを返す
        return (new PlayerResource($result))->response()->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * 指定されたプレイヤーを表示
     */
    public function show(string $id)
    {
        $result = $this->playerService->getPlayerById((int)$id);
        
        // 見つからない場合は404ステータスコードを返す
        if (isset($result['error_messages']) && isset($result['status']) && $result['status'] === 'not_found') {
            return response()->json($result, Response::HTTP_NOT_FOUND);
        }
        
        return new PlayerResource($result);
    }

    /**
     * 指定されたプレイヤーを更新
     */
    public function update(UpdatePlayerRequest $request, string $id)
    {
        $result = $this->playerService->updatePlayer((int)$id, $request->validated());
        
        // 見つからない場合は404ステータスコードを返す
        if (isset($result['error_messages']) && isset($result['status']) && $result['status'] === 'not_found') {
            return response()->json($result, Response::HTTP_NOT_FOUND);
        }
        
        return new PlayerResource($result);
    }

    /**
     * 指定されたプレイヤーを削除
     */
    public function destroy(string $id)
    {
        $result = $this->playerService->deletePlayer((int)$id);
        
        // 見つからない場合は404ステータスコードを返す
        if (isset($result['error_messages']) && isset($result['status']) && $result['status'] === 'not_found') {
            return response()->json($result, Response::HTTP_NOT_FOUND);
        }
        
        return new PlayerResource($result);
    }
}