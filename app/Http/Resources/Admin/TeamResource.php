<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\BaseResource;

class TeamResource extends BaseResource
{
    public function toArray($request)
    {
        $team = $this->resource['data']['team'];
        $this->resource['data']['team'] = $this->formatTeamData($team);
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