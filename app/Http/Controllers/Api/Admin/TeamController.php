<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Team\IndexRequest;
use App\Http\Requests\Admin\Team\StoreRequest;
use App\Http\Requests\Admin\Team\UpdateRequest;
use App\Http\Resources\Admin\TeamListResource;
use App\Http\Resources\Admin\TeamResource;
use App\Http\Resources\BaseResource;
use App\Services\Admin\Team\TeamServiceInterface;
use Illuminate\Http\Response;

class TeamController extends Controller
{
    public function __construct(private TeamServiceInterface $teamService) {}

    /**
     * チーム一覧を表示
     */
    public function index(IndexRequest $request): TeamListResource
    {
        $perPage = $request->query('per_page', 15);
        $result = $request->isAll() ? 
            $this->teamService->getAllTeams($request->validated()) 
        : 
            $this->teamService->getPaginatedTeams((int)$perPage, $request->validated());
        return new TeamListResource($result);
    }

    /**
     * 新しいチームを保存
     */
    public function store(StoreRequest $request)
    {
        $result = $this->teamService->createTeam($request->validated());
        
        // エラーの場合は500ステータスコードを返す
        if (isset($result['error_messages'])) {
            return response()->json($result, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
        
        // 作成成功時は201ステータスコードを返す
        return (new TeamResource($result))->response()->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * 指定されたチームを表示
     */
    public function show(string $id)
    {
        $result = $this->teamService->getTeamById((int)$id);
        
        // 見つからない場合は404ステータスコードを返す
        if (isset($result['error_messages']) && isset($result['status']) && $result['status'] === 'not_found') {
            return response()->json($result, Response::HTTP_NOT_FOUND);
        }
        
        return new TeamResource($result);
    }

    /**
     * 指定されたチームを更新
     */
    public function update(UpdateRequest $request, string $id)
    {
        $result = $this->teamService->updateTeam((int)$id, $request->validated());
        
        // 見つからない場合は404ステータスコードを返す
        if (isset($result['error_messages']) && isset($result['status']) && $result['status'] === 'not_found') {
            return response()->json($result, Response::HTTP_NOT_FOUND);
        }
        
        return new TeamResource($result);
    }

    /**
     * 指定されたチームを削除
     */
    public function destroy(string $id)
    {
        $result = $this->teamService->deleteTeam((int)$id);
        
        // 見つからない場合は404ステータスコードを返す
        if (isset($result['error_messages']) && isset($result['status']) && $result['status'] === 'not_found') {
            return response()->json($result, Response::HTTP_NOT_FOUND);
        }
        
        return new BaseResource($result);
    }
}