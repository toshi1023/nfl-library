<?php

namespace App\Http\Resources\Mobile\Team;

use App\Http\Resources\BaseResource;

class TeamListResource extends BaseResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $teams = $this->resource['data']['teams']->map(function($team) {
            return [
                'id' => $team->id,
                'city' => $team->city,
                'name' => $team->name,
                'conference' => $team->conference,
                'area' => $team->area,
                'image_file' =>  $team->image_file,
                'back_image_file' => $team->back_image_file
            ];
        });
        $this->resource['data']['teams'] = $teams;
        return $this->successResponse($request, $this->resource);
    }
}
