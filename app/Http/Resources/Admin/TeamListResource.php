<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\BaseResource;

class TeamListResource extends BaseResource
{
    public function toArray($request)
    {
        $teams = $this->resource['data']['teams'];

        // ページネーションチェック
        if ($this->checkPagination($teams)) {
            // ページネーション情報を取得
            $paginationInfo = $this->getPaginationInfo($teams);
            
            // データを変換
            $formattedTeams = collect($teams->items())->map(function($team) {
                return $this->formatTeamData($team);
            });
            
            $this->resource['data']['teams'] = $formattedTeams;
            
            return $this->successResponse($request, $this->resource, $paginationInfo);
        }
        
        // 通常のコレクション処理
        $this->resource['data']['teams'] = $teams->map(function($team) {
            return $this->formatTeamData($team);
        });
        
        return $this->successResponse($request, $this->resource);
    }

    private function formatTeamData($team): array
    {
        return [
            'id' => $team->id,
            'team_name' => $team->team_name,
            'team_abbreviation' => $team->team_abbreviation,
            'team_location' => $team->team_location,
            'logo_image' => $team->logo_image,
            'created_at' => $team->created_at,
            'updated_at' => $team->updated_at,
        ];
    }
}