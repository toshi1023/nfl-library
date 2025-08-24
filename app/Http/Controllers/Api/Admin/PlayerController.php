<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Player\IndexRequest;
use App\Http\Requests\Admin\Player\StoreRequest;
use App\Http\Requests\Admin\Player\UpdateRequest;
use App\Http\Resources\Admin\PlayerListResource;
use App\Http\Resources\Admin\PlayerResource;
use App\Http\Resources\BaseResource;
use App\Services\Admin\Player\PlayerServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PlayerController extends Controller
{
    public function __construct(private PlayerServiceInterface $playerService) {}

    /**
     * プレイヤー一覧を表示
     */
    public function index(IndexRequest $request): PlayerListResource
    {
        $perPage = $request->query('per_page', 15);
        $result = $this->playerService->getPaginatedPlayers((int)$perPage);
        
        return new PlayerListResource($result);
    }

    /**
     * 新しいプレイヤーを保存
     */
    public function store(StoreRequest $request)
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
    public function update(UpdateRequest $request, string $id)
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
        
        return new BaseResource($result);
    }
}