# Resource Layer Code Conventions

このプロジェクトのResourceパターンのコード規約をClaudeがコード生成時に参考にするために記録します。

## ディレクトリ構造
```
app/Http/Resources/
├── BaseResource.php                 # 基底クラス
├── ErrorResource.php                # エラー専用リソース
├── Mobile/                         # モバイルAPI用
│   ├── Player/
│   │   └── PlayerListResource.php
│   ├── Team/
│   │   └── TeamListResource.php
│   └── Season/
│       └── SeasonListResource.php
└── Admin/                          # 管理画面用
    └── PlayerListResource.php  # collectionやLengthAwarePaginatorのレスポンスを生成
    └── PlayerResource.php      # 単一データのレスポンスを生成
```

## 命名規則

### ファイル・クラス名
- 実装クラス: `{Entity}Resource` または `{Entity}ListResource`
- 名前空間: `App\Http\Resources\{Context}\{Entity}`

### メソッド名
- `toArray($request)`: リソース変換メソッド（必須）
- `with($request)`: 追加メタデータ設定
- `withResponse($request, $response)`: レスポンス加工
- `formatPlayerData($player)`: データフォーマット用のprivateメソッド

## コード規約

### 1. BaseResource（基底クラス）
```php
<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Pagination\LengthAwarePaginator;

class BaseResource extends JsonResource
{
    public function __construct(array $data)
    {
        parent::__construct($data);
    }

    public function successResponse(Request $request, array $data, array $paginationInfo = []) : array
    {
        $method = $request->method();

        // ページネーションを設定
        if(count($paginationInfo) > 0) {
            $data['pagination'] = $paginationInfo;
        }

        if(!array_key_exists('status', $data) || !$data['status']) 
            $data['status'] = config('const.Success');
        if(!array_key_exists('message', $data) || !$data['message']) 
            $data['message'][] = $this->getInitialMessage($method);
        
        return $data;
    }

    public function checkPagination($dataList) : bool
    {
        return $dataList instanceof LengthAwarePaginator;
    }

    public function getPaginationInfo(LengthAwarePaginator $dataList) : array
    {
        return [
            'current_page' => $dataList->currentPage(),
            'per_page' => $dataList->perPage(),
            'total' => $dataList->total(),
            'last_page' => $dataList->lastPage(),
            'first_page_url' => $dataList->url(1),
            'last_page_url' => $dataList->url($dataList->lastPage()),
            'next_page_url' => $dataList->nextPageUrl(),
            'prev_page_url' => $dataList->previousPageUrl(),
            'path' => $dataList->path(),
            'from' => $dataList->firstItem(),
            'to' => $dataList->lastItem(),
        ];
    }

    private function getInitialMessage(string $method)
    {
        switch(strtolower($method)) {
            case 'get': return 'データの取得に成功しました。';
            case 'post': return 'データの登録に成功しました。';
            case 'put': return 'データの更新に成功しました。';
            case 'delete': return 'データの削除に成功しました。';
            case 'patch': return 'データの復元に成功しました。';
            default: return '該当しないHttp動詞が渡されました。';
        }
    }
}
```

**ポイント:**
- すべてのResourceは `BaseResource` を継承
- `successResponse()` メソッドで統一されたレスポンス形式を提供
- ページネーション情報を第3引数で受け取り設定
- `checkPagination()` でデータがページネーションされているかチェック
- `getPaginationInfo()` でページネーション情報を統一形式で取得
- HTTPメソッドに応じた初期メッセージを自動設定

### 2. 一般的なResourceクラス（Mobile用）
```php
<?php

namespace App\Http\Resources\Mobile\Team;

use App\Http\Resources\BaseResource;

class TeamListResource extends BaseResource
{
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
```

**ポイント:**
- `BaseResource` を継承
- `map()` を使用してコレクションを変換
- 必要なフィールドのみ選択して出力
- 最終的に `successResponse()` を使用してレスポンス統一

### 3. シンプルなResourceクラス（Admin用）
```php
<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\BaseResource;

class PlayerResource extends BaseResource
{
    public function toArray($request)
    {
        $player = $this->resource['data']['player'];
        $this->resource['data']['player'] = $this->formatPlayerData($player);
        return $this->successResponse($request, $this->resource);
    }

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
```

**ポイント:**
- シンプルなデータ変換処理
- `formatPlayerData()` で共通フォーマット化
- 元データを変換してからsuccessResponseに渡す
- 必要なフィールドを明示的に選択

### 4. エラー専用Resource
```php
<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ErrorResource extends JsonResource
{
    private int $statusCode;
    
    public function __construct(array $data = [], int $statusCode = Response::HTTP_INTERNAL_SERVER_ERROR)
    {
        parent::__construct($data);
        $this->statusCode = $statusCode;
    }

    public function toArray($request)
    {
        $res = [
            'message'  => $this->resource['message'],
        ];
        if(config('const.app_env') === 'local') {
            $res = array_merge($res, [
                'details' => [
                    'message'  => $this->resource['details']['message'],
                    'file'     => $this->resource['details']['file'],
                    'line'     => $this->resource['details']['line']
                ]
            ]);
        }
        return $res;
    }

    public function with($request)
    {
        return [
            'status' => $this->resource['status'],
            'message'  => $this->resource['message'],
        ];
    }

    public function withResponse($request, $response)
    {
        $response->setStatusCode($this->statusCode);
    }
}
```

**ポイント:**
- エラー専用Resource（BaseResourceを継承しない）
- コンストラクタでステータスコードを受け取り保持
- 開発環境でのみエラー詳細を表示
- `with()` でメタデータ設定
- `withResponse()` でカスタムステータスコード設定

## 実装パターン

### 1. コレクション処理
```php
// Eloquentコレクションの変換
$items = $this->resource['data']['items']->map(function($item) {
    return [
        'id' => $item->id,
        'name' => $item->name,
        // 必要なフィールドのみ選択
    ];
});
$this->resource['data']['items'] = $items;
```

### 2. リレーション含む変換
```php
$rosters = $this->resource['data']['rosters']->map(function($roster) {
    return [
        'id' => $roster->id,
        'team' => [
            'id' => $roster->team->id,
            'name' => $roster->team->name,
        ],
        'player' => [
            'id' => $roster->player->id,
            'firstname' => $roster->player->firstname,
        ],
        // Null チェック
        'roster_starter' => $roster->rosterStarter ? [
            'id' => $roster->rosterStarter->id,
        ] : null,
    ];
});
```

### 3. 条件分岐処理
```php
public function toArray($request)
{   
    // 複数データ処理でページネーションが設定されている場合
    if ($this->checkPagination($players)) {
        // ...
    }
    
    return $this->successResponse($request, $this->resource);
}
```

エラー処理はapp\Exceptions\Handler.phpにて実装しているため、Resourcesフォルダ直下のクラスにはエラー処理の記載は不要

### 4. ページネーション対応
```php
// BaseResourceのヘルパーメソッドを使用
public function toArray($request)
{
    $players = $this->resource['data']['players'];
    
    // ページネーションチェック
    if ($this->checkPagination($players)) {
        // ページネーション情報を取得
        $paginationInfo = $this->getPaginationInfo($players);
        
        // データを変換
        $formattedPlayers = collect($players->items())->map(function($player) {
            return $this->formatPlayerData($player);
        });
        
        $this->resource['data']['players'] = $formattedPlayers;
        
        return $this->successResponse($request, $this->resource, $paginationInfo);
    }
    
    // 通常のコレクション処理
    $this->resource['data']['players'] = $players->map(function($player) {
        return $this->formatPlayerData($player);
    });
    
    return $this->successResponse($request, $this->resource);
}
```

## インポート順序
1. 基本Laravelクラス (`Illuminate\Http\*`)
2. プロジェクトResource (`App\Http\Resources\*`)
3. その他必要なクラス

## 設計思想
- すべてのResourceはBaseResourceを継承（エラー用除く）
- データ変換では必要なフィールドのみ選択
- エラー・正常レスポンスの統一形式
- リレーションデータのNull安全な処理
- 開発・本番環境でのエラー情報出し分け
- Mobile/Adminでコンテキストを分離
- ページネーション対応の標準化