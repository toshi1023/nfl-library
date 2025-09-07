# Service Layer Code Conventions

このプロジェクトのServiceパターンのコード規約をClaudeがコード生成時に参考にするために記録します。

## ディレクトリ構造
```
app/Services/
├── BaseServiceInterface.php          # 基底インターフェース
├── BaseService.php                   # 基底クラス
├── Mobile/                          # モバイルAPI用
│   ├── Auth/
│   │   ├── AuthServiceInterface.php
│   │   └── AuthService.php
│   ├── Player/
│   │   ├── PlayerServiceInterface.php
│   │   └── PlayerService.php
│   ├── Search/
│   │   ├── SearchServiceInterface.php
│   │   └── SearchService.php
│   └── ...
└── Admin/                           # 管理画面用
    └── Player/
        ├── PlayerServiceInterface.php
        └── PlayerService.php
```

## 命名規則

### ファイル・クラス名
- インターフェース: `{Entity}ServiceInterface`
- 実装クラス: `{Entity}Service`
- 名前空間: `App\Services\{Context}\{Entity}`

### メソッド名
- `get{Description}()`: データ取得系メソッド
- `create{Entity}()`: 新規作成
- `update{Entity}()`: 更新
- `delete{Entity}()`: 削除
- `login()`, `logout()`: 認証系

## コード規約

### 1. インターフェース
```php
<?php

namespace App\Services\Mobile\Player;

interface PlayerServiceInterface
{
    /**
     * ロスターやスターター情報を取得
     */
    public function getPlayerInfo(int $season, int $team_id) : array;
}
```

**ポイント:**
- 戻り値の型宣言は必須 (`: array`)
- ドキュメントコメントは日本語で記載
- メソッドの目的を明確に記述

### 2. 実装クラス
```php
<?php

namespace App\Services\Mobile\Player;

use App\Lib\Common;
use App\Repositories\BaseRepositoryInterface;
use App\Services\BaseService;
use App\Services\Mobile\Player\PlayerServiceInterface;
use Exception;
use InvalidArgumentException;

class PlayerService extends BaseService implements PlayerServiceInterface
{
    public function __construct(private BaseRepositoryInterface $repository) {}

    public function getPlayerInfo(int $season, int $team_id) : array
    {
        // 値チェック
        if(!$season) throw new InvalidArgumentException('シーズンが無効な値のため検索に失敗しました');
        if(!$team_id) throw new InvalidArgumentException('チームが無効な値のため検索に失敗しました');
        
        // ロスター、スターター情報を取得
        return $this->wrapperResponse([
            'rosters' => $this->repository->playerRepository()->queryRosterStarterInfo($season, $team_id),
        ]);
    }
}
```

**ポイント:**
- `BaseService` を継承し、対応する `Interface` を実装
- コンストラクタで `BaseRepositoryInterface` をDI
- `private` プロパティ宣言でプロパティプロモーション使用
- 必ず入力値チェックを実装
- レスポンスは `wrapperResponse()` でラップ
- エラーチェックに引っかかった場合はthrow new Exception({メッセージ内容})を実行してhandler.phpにエラー処理をスローすること
- エラーのExceptionの種類を絞れる場合は絞ること(throw new InvalidArgumentException({メッセージ内容}))

### 3. BaseService活用

#### 共通メソッド
```php
// レスポンスラッパー
$this->wrapperResponse($data, $status, $message);

// エラーログ出力
$this->getErrorLog($exception, $className, $functionName);

// サーバーエラーレスポンス
$this->setServerErrorMessage($exception);

// ユーザー情報取得
$this->getUserInfo();
```

#### レスポンス形式
```php
// 正常系
return $this->wrapperResponse([
    'players' => $data
], null, 'プレイヤーが正常に作成されました');
```

### 4. バリデーション・例外処理

#### 入力値チェック
```php
// 値チェックの例
if (!$season) throw new InvalidArgumentException('シーズンが無効な値のため検索に失敗しました');
if (!$team_id) throw new InvalidArgumentException('チームが無効な値のため検索に失敗しました');
if ($perPage <= 0) throw new InvalidArgumentException('ページサイズは1以上である必要があります');

// 配列キーの存在チェック
if (!array_key_exists('email', $credentials) || !$credentials['email']) {
    throw new InvalidArgumentException('メールアドレスが無効な値のため検索に失敗しました');
}
```

#### 認証処理の例
```php
public function login(array $credentials) : array
{
    // 値チェック
    if(!array_key_exists('email', $credentials) || !$credentials['email']) 
        throw new InvalidArgumentException('メールアドレスが無効な値のため検索に失敗しました');
    
    // 認証処理
    $user = $this->repository->userRepository()->queryUserSingle($credentials['email']);
    
    if (!$user || !Hash::check($credentials['password'], $user->password)) {
        return [
            "message" => config('const.SystemMessage.LOGIN_ERR'),
            "status"  => config('const.Unauthorized')
        ];
    }
    
    // 成功時の処理...
}
```

### 5. リソース操作パターン

#### CRUD操作
```php
// 取得系
public function getAllPlayers() : array
{
    return $this->wrapperResponse([
        'players' => $this->repository->adminPlayerRepository()->getAllPlayers()
    ]);
}

// 作成
public function createPlayer(array $data) : array
{
    $player = $this->repository->adminPlayerRepository()->createPlayer($data);
    return $this->wrapperResponse(['player' => $player], null, 'プレイヤーが正常に作成されました');
}

// 更新
public function updatePlayer(int $id, array $data) : array
{
    if (!$id) throw new InvalidArgumentException('プレイヤーIDが無効です');
    
    $player = $this->repository->adminPlayerRepository()->getPlayerById($id);
    if (!$player) {
        return [
            'error_messages' => ['指定されたプレイヤーが見つかりません'],
            'status' => config('const.NotFound')
        ];
    }
    
    $result = $this->repository->adminPlayerRepository()->updatePlayer($id, $data);
    // ... 更新処理とレスポンス
}
```

### 6. インポート順序
1. 基本Laravelクラス (`Illuminate\*`)
2. プロジェクト共通ライブラリ (`App\Lib\*`)
3. プロジェクトリポジトリ (`App\Repositories\*`)
4. プロジェクトサービス (`App\Services\*`)
5. 基本PHPクラス (`Exception`, `InvalidArgumentException`)

### 7. エラーハンドリング
- エラーチェックに引っかかった場合はthrow new Exception({メッセージ内容})を実行してhandler.phpにエラー処理をスローすること
- エラーのExceptionの種類を絞れる場合は絞ること(throw new InvalidArgumentException({メッセージ内容}))

### 8. Repository活用パターン
```php
// Mobile Repository使用
$this->repository->playerRepository()->queryRosterStarterInfo($season, $team_id)
$this->repository->teamRepository()->queryTeams()
$this->repository->userRepository()->queryUserSingle($email)

// Admin Repository使用
$this->repository->adminPlayerRepository()->getAllPlayers()
$this->repository->adminPlayerRepository()->createPlayer($data)
```

## サービスコンテナ登録

新しいService InterfaceとClassを作成した場合は、必ず `AppServiceProvider.php` でDIコンテナに登録する。

### 登録パターン
```php
// app/Providers/AppServiceProvider.php の register() メソッド内

/************************************************
 *  サービス層
 ************************************************/
// Mobile Services
$this->app->singleton(PlayerServiceInterface::class,        PlayerService::class);
$this->app->singleton(AuthServiceInterface::class,          AuthService::class);
$this->app->singleton(SearchServiceInterface::class,        SearchService::class);

// Admin Services (同名クラスの場合はエイリアス使用)
$this->app->singleton(AdminPlayerServiceInterface::class,   AdminPlayerService::class);
```

### 重要な規約
- **必ずsingleton()で登録** - instance()やbind()は使わない
- **インターフェース => 実装クラスの順**で記述
- **Mobile/Admin で分けてコメントアウト**
- **エイリアスを使用している場合は適切にuse文で読み込み**

## 設計思想
- Service層ではビジネスロジックを実装
- Repository層への依存はBaseRepositoryInterface経由のみ
- すべての入力値に対してバリデーションを実施
- エラーハンドリングは統一された形式で実装
- レスポンスはwrapperResponse()で統一
- Mobile/Admin でコンテキストを分離
- すべてのServiceはDIコンテナでsingleton登録