<?php

namespace App\Http\Resources\Mobile\Player;

use App\Http\Resources\BaseResource;

class PlayerListResource extends BaseResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $rosters = $this->resource['data']['rosters']->map(function($roster) {
            return [
                'id' => $roster->id,
                'season' => $roster->season,
                'team_id' => $roster->team_id,
                'player_id' => $roster->player_id,
                'position_id' => $roster->position_id,
                'number' =>  $roster->number,
                'rating' => $roster->rating,
                'experience' => $roster->experience,
                'team' => [
                    'id' => $roster->team->id,
                    'city' => $roster->team->city,
                    'name' => $roster->team->name,
                    'image_file' =>  $roster->team->image_file,
                    'back_image_file' => $roster->team->back_image_file
                ],
                'player' => [
                    'id' => $roster->player->id,
                    'firstname' => $roster->player->firstname,
                    'lastname' => $roster->player->lastname,
                    'birthday' => $roster->player->birthday,
                    'height' => $roster->player->height,
                    'weight' => $roster->player->weight,
                    'college' => $roster->player->college,
                    'drafted_team' => $roster->player->drafted_team,
                    'drafted_round' => $roster->player->drafted_round,
                    'drafted_rank' => $roster->player->drafted_rank,
                    'drafted_year' => $roster->player->drafted_year,
                    'image_file' => $roster->player->image_file,
                    'birthday_year' => $roster->player->birthday_year,
                    'birthday_date' => $roster->player->birthday_date,
                    'image_url' => $roster->player->image_url,
                ],
                'position' => [
                    'id' => $roster->position->id,
                    'abstract_category' => $roster->position->abstract_category,
                    'category' => $roster->position->category,
                    'name' => $roster->position->name,
                    'odflg' => $roster->position->odflg,
                ],
                'roster_starter' => $roster->rosterStarter ? [
                    'id' => $roster->rosterStarter->id,
                    'season' => $roster->rosterStarter->season,
                    'odflg' => $roster->rosterStarter->odflg,
                    'roster_id' => $roster->rosterStarter->roster_id,
                ] : null,
            ];
        });
        $this->resource['data']['rosters'] = $rosters;
        return $this->successResponse($request, $this->resource);
    }
}
