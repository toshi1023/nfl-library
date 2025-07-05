<?php

namespace App\Http\Resources\Season;

use App\Http\Resources\BaseResource;

class SeasonListResource extends BaseResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $seasons = $this->resource['data']['seasons']->map(function($season) {
            return [
                'season' => $season->season,
            ];
        });
        $this->resource['data']['seasons'] = $seasons;
        return $this->successResponse($request, $this->resource);
    }
}
