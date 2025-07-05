<?php

namespace App\Http\Resources\Team;

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
        $teams = $this->resource['teams']->map(function($resData) {
            return [
                'id' => $resData->id,
                'city' => $resData->city,
                'name' => $resData->name,
                'conference' => $resData->conference,
                'area' => $resData->area,
                'image_file' =>  $resData->image_file,
                'back_image_file' => $resData->back_image_file
            ];
        });
        $this->resource['teams'] = $teams;
        return $this->successResponse($request, $this->resource);
    }
}
