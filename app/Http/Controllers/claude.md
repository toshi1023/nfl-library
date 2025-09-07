# Controller Layer Code Conventions

このファイルは、ControllerクラスのコーディングルールをClaudeに理解してもらうために作成しました。

## ディレクトリ構造
```
app/Http/Controllers/
├── Controller.php                    # ベースコントローラー
└── Api/
    ├── Mobile/                      # モバイルAPI用
    │   ├── AuthController.php
    │   ├── PlayerController.php
    │   ├── SearchController.php
    │   ├── FoulRuleController.php
    │   └── InitialController.php
    └── Admin/                       # 管理画面用
        └── PlayerController.php
```

## 基本構成

### 命名規則
- クラス名: `{Entity}Controller`
- 名前空間: `App\Http\Controllers\Api\{Context}`
- メソッド名: RESTfulアクション（`index`, `store`, `show`, `update`, `destroy`）またはカスタムアクション（`info`, `login`, `logout`）

### 基本パターン
- `Controller` ベースクラスを継承
- コンストラクタインジェクションでServiceInterface注入
- FormRequestクラスでバリデーション
- Resourceクラスでレスポンス構築
- 適切なHTTPステータスコード返却

## 実装例

### 1. ベースController
```php
<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * レスポンス共通メソッド
     */
    protected function jsonResponse(array $data) : JsonResponse
    {
        return response()->json(
            $data, 
            array_key_exists('status', $data) ? $data['status'] : config('const.Success'), 
            [], 
            JSON_UNESCAPED_UNICODE
        );
    }
}
```

**ポイント:**
- Laravel標準のBaseControllerを継承
- 必要なTraitを使用（`AuthorizesRequests`, `DispatchesJobs`, `ValidatesRequests`）
- `jsonResponse()` 共通メソッドでJSON形式のレスポンス統一(基本的にはResourceクラスでレスポンスを統一)
- `JSON_UNESCAPED_UNICODE` で日本語の文字化け防止

### 2. Mobile APIコントローラー（シンプル版）
```php
<?php

namespace App\Http\Controllers\Api\Mobile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Mobile\LoginRequest;
use App\Http\Resources\BaseResource;
use App\Services\Mobile\Auth\AuthServiceInterface;

class AuthController extends Controller
{
    public function __construct(private AuthServiceInterface $service) {}

    /**
     * ログイン管理
     */
    public function login(LoginRequest $request) : BaseResource
    {
        return new BaseResource($this->service->login($request->validated()));
    }

    /**
     * ログアウト処理
     */
    public function logout() : BaseResource
    {
        return new BaseResource($this->service->logout());
    }
}
```

**ポイント:**
- コンストラクタプロパティプロモーション（PHP 8.0+）でDI
- FormRequestでバリデーション実行
- `$request->validated()` でバリデーション済みデータを取得
- Resourceクラスでレスポンス構築
- Resourceクラスを使用する際はキーがdataの値が空配列の場合はBaseResourceクラスを使用
- Resourceクラスを使用する際はキーがdataの値が空配列ではなく値を含めている場合は、Resourcesフォルダ直下のclaude.mdに沿ってカスタムのResourceクラスを定義して使用する
- 戻り値の型宣言を明示

### 3. Mobile APIコントローラー（カスタムレスポンス版）
```php
<?php

namespace App\Http\Controllers\Api\Mobile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Mobile\FoulRuleRequest;
use App\Services\Mobile\FoulRule\FoulRuleServiceInterface;
use Illuminate\Http\JsonResponse;

class FoulRuleController extends Controller
{
    public function __construct(private FoulRuleServiceInterface $service) {}

    /**
     * ペナルティのデータをリターン
     */
    public function info(FoulRuleRequest $request) : JsonResponse
    {
        return $this->jsonResponse(
            $this->service->getFoulRuleInfo($request->status_type, $request->yard_info)
        );
    }
}
```

**ポイント:**
- `jsonResponse()` ベースメソッドを使用してカスタムレスポンス
- リクエストパラメータを個別にアクセス
- `JsonResponse` 型宣言でJSON形式を明示

### 4. Admin RESTfulコントローラー
```php
<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Player\IndexRequest;
use App\Http\Requests\Admin\Player\StoreRequest;
use App\Http\Requests\Admin\Player\UpdateRequest;
use App\Http\Resources\Admin\PlayerListResource;
use App\Http\Resources\Admin\PlayerResource;
use App\Http\Resources\BaseResource;
use App\Services\Admin\Player\PlayerServiceInterface;
use Illuminate\Http\Response;

class PlayerController extends Controller
{
    public function __construct(private PlayerServiceInterface $playerService) {}

    /**
     * プレイヤー一覧を表示
     */
    public function index(IndexRequest $request): PlayerListResource
    {
        $perPage = $request->query('per_page', 15);
        $result = $this->playerService->getPaginatedPlayers((int)$perPage);
        
        return new PlayerListResource($result);
    }

    /**
     * 新しいプレイヤーを保存
     */
    public function store(StoreRequest $request)
    {
        $result = $this->playerService->createPlayer($request->validated());
        
        // エラーの場合は500ステータスコードを返す
        if (isset($result['error_messages'])) {
            return response()->json($result, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
        
        // 作成成功時は201ステータスコードを返す
        return (new PlayerResource($result))->response()->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * 指定されたプレイヤーを表示
     */
    public function show(string $id)
    {
        $result = $this->playerService->getPlayerById((int)$id);
        
        // 見つからない場合は404ステータスコードを返す
        if (isset($result['error_messages']) && isset($result['status']) && $result['status'] === 'not_found') {
            return response()->json($result, Response::HTTP_NOT_FOUND);
        }
        
        return new PlayerResource($result);
    }

    /**
     * 指定されたプレイヤーを更新
     */
    public function update(UpdateRequest $request, string $id)
    {
        $result = $this->playerService->updatePlayer((int)$id, $request->validated());
        
        // 見つからない場合は404ステータスコードを返す
        if (isset($result['error_messages']) && isset($result['status']) && $result['status'] === 'not_found') {
            return response()->json($result, Response::HTTP_NOT_FOUND);
        }
        
        return new PlayerResource($result);
    }

    /**
     * 指定されたプレイヤーを削除
     */
    public function destroy(string $id)
    {
        $result = $this->playerService->deletePlayer((int)$id);
        
        // 見つからない場合は404ステータスコードを返す
        if (isset($result['error_messages']) && isset($result['status']) && $result['status'] === 'not_found') {
            return response()->json($result, Response::HTTP_NOT_FOUND);
        }
        
        return new BaseResource($result);
    }
}
```

**ポイント:**
- RESTfulリソースコントローラーパターン
- エラーハンドリングとHTTPステータスコード制御
- `Response::HTTP_*` 定数の使用
- パラメータの型キャスト（`(int)$id`）
- 作成時は201、削除時は200、エラー時は適切なステータス返却

## コントローラーのパターン

### レスポンス形式
1. **Resourceクラス使用**: `return new BaseResource($result);`
2. **直接JsonResponse**: `return $this->jsonResponse($data);`
3. **ステータスコード指定**: `return response()->json($result, 404);`

### エラーハンドリング
```php
// サービス層からのエラーレスポンス判定
if (isset($result['error_messages'])) {
    return response()->json($result, Response::HTTP_INTERNAL_SERVER_ERROR);
}

// 404 Not Foundの場合
if (isset($result['status']) && $result['status'] === 'not_found') {
    return response()->json($result, Response::HTTP_NOT_FOUND);
}
```

### パラメータ処理
```php
// FormRequestの場合
$data = $request->validated();

// 通常のRequestの場合
$perPage = $request->query('per_page', 15);
$data = $request->all();

// 個別パラメータアクセス
$this->service->method($request->param1, $request->param2);
```

### DIパターン
```php
// PHP 8.0+ コンストラクタプロパティプロモーション（推奨）
public function __construct(private ServiceInterface $service) {}

// 従来の書き方
private ServiceInterface $service;
public function __construct(ServiceInterface $service)
{
    $this->service = $service;
}
```

## HTTPステータスコード使用規則
- **200 OK**: `show`, `update`, `destroy` の成功時
- **201 Created**: `store` の成功時 - `Response::HTTP_CREATED`
- **404 Not Found**: リソースが見つからない場合 - `Response::HTTP_NOT_FOUND`
- **500 Internal Server Error**: サーバーエラー時 - `Response::HTTP_INTERNAL_SERVER_ERROR`

## インポート順序
1. `App\Http\Controllers\Controller` (ベースクラス)
2. FormRequestクラス (`App\Http\Requests\*`)
3. Resourceクラス (`App\Http\Resources\*`)
4. Serviceクラス (`App\Services\*`)
5. Laravelクラス (`Illuminate\Http\*`)

## 重要事項
- すべてのAPIControllerは`Controller`ベースクラスを継承
- コンストラクタでServiceInterfaceを注入（DI）
- FormRequestでバリデーション処理を委譲
- Resourceクラスでレスポンス形式を統一
- エラー時は適切なHTTPステータスコードを返却
- Mobile/Adminで用途を明確に分離
- RESTfulパターンに従ったメソッド名使用
- 戻り値の型宣言を明示
- 日本語コメントで処理内容を説明
- PHPDocでメソッドの説明を記載