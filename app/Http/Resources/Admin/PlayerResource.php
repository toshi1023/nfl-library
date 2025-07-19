<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\BaseResource;

class PlayerResource extends BaseResource
{
    /**
     * リソースを配列に変換する
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // エラーレスポンスの場合
        if (isset($this->resource['error_messages'])) {
            return $this->resource;
        }
        
        // 単一プレイヤーの場合
        if (isset($this->resource['data']['player'])) {
            $player = $this->resource['data']['player'];
            $formattedPlayer = $this->formatPlayerData($player);
            
            return $this->successResponse($request, [
                'data' => $formattedPlayer,
                'status' => $this->resource['status'] ?? config('const.Success'),
                'message' => $this->resource['message'] ?? null
            ]);
        }
        
        // 複数プレイヤーの場合(一覧取得)
        if (isset($this->resource['data']['players'])) {
            $players = $this->resource['data']['players'];
            
            // Paginatorの場合
            if (method_exists($players, 'items')) {
                $playerCollection = collect($players->items())->map(function($player) {
                    return $this->formatPlayerData($player);
                });
                
                return $this->successResponse($request, [
                    'data' => $playerCollection,
                    'meta' => $this->resource['meta'] ?? [],
                    'status' => $this->resource['status'] ?? config('const.Success'),
                    'message' => $this->resource['message'] ?? null
                ]);
            } else {
                // Collectionの場合
                $playerCollection = $players->map(function($player) {
                    return $this->formatPlayerData($player);
                });
                
                return $this->successResponse($request, [
                    'data' => $playerCollection,
                    'status' => $this->resource['status'] ?? config('const.Success'),
                    'message' => $this->resource['message'] ?? null
                ]);
            }
        }
        
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