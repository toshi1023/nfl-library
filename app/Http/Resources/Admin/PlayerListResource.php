<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\BaseResource;

class PlayerListResource extends BaseResource
{
    /**
     * リソースを配列に変換する
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $players = $this->resource['data']['players'];
        
        
        // Paginatorの場合
        if ($this->checkPagination($players)) {
            $this->resource['data']['players'] = collect($players->items())->map(function($player) {
                return $this->formatPlayerData($player);
            })->toArray();
            
            return $this->successResponse($request, $this->resource, $this->getPaginationInfo($players));
        }
        // Collectionの場合
        $this->resource['data']['players'] = collect($players)->map(function($player) {
            return $this->formatPlayerData($player);
        })->toArray();
        return $this->successResponse($request, $this->resource);
    }

    /**
     * プレイヤーデータを統一フォーマットに変換
     */
    private function formatPlayerData($player): array
    {
        return [
            'id' => $player->id,
            'firstname' => $player->firstname,
            'lastname' => $player->lastname,
            'birthday' => $player->birthday,
            'birthday_year' => $player->birthday_year,
            'birthday_date' => $player->birthday_date,
            'height' => $player->height,
            'weight' => $player->weight,
            'college' => $player->college,
            'drafted_team' => $player->drafted_team,
            'drafted_round' => $player->drafted_round,
            'drafted_rank' => $player->drafted_rank,
            'drafted_year' => $player->drafted_year,
            'image_file' => $player->image_file,
            'image_url' => $player->image_url,
            'created_at' => $player->created_at,
            'updated_at' => $player->updated_at,
        ];
    }
}