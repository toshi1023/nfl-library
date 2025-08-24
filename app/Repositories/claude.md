# Repository Layer Code Conventions

このプロジェクトのRepositoryパターンのコード規約をClaudeがコード生成時に参考にするために記録します。

## ディレクトリ構造
```
app/Repositories/
├── BaseRepositoryInterface.php      # 基底インターフェース
├── BaseRepository.php               # 基底クラス
├── Mobile/                         # モバイルAPI用
│   ├── Player/
│   │   ├── PlayerRepositoryInterface.php
│   │   └── PlayerRepository.php
│   ├── Team/
│   │   ├── TeamRepositoryInterface.php
│   │   └── TeamRepository.php
│   └── ...
└── Admin/                          # 管理画面用
    └── Player/
        ├── PlayerRepositoryInterface.php
        └── PlayerRepository.php
```

## 命名規則

### ファイル・クラス名
- インターフェース: `{Entity}RepositoryInterface`
- 実装クラス: `{Entity}Repository`
- 名前空間: `App\Repositories\{Context}\{Entity}`

### メソッド名
- `query{Description}()`: データ取得系メソッド
- `getAll{Entities}()`: 全データ取得
- `getPaginated{Entities}()`: ページネーション取得
- `get{Entity}ById()`: ID指定取得
- `create{Entity}()`: 新規作成
- `update{Entity}()`: 更新
- `delete{Entity}()`: 削除

## コード規約

### 1. インターフェース
```php
<?php

namespace App\Repositories\Mobile\Player;

use Illuminate\Database\Eloquent\Collection;

interface PlayerRepositoryInterface
{
    /**
     * ロスター・スターター情報をDBから取得
     * from: rosters
     * join: [players, teams, positions, starters]
     */
    public function queryRosterStarterInfo(int $season, int $team_id) : Collection;
}
```

**ポイント:**
- 戻り値の型宣言は必須 (`: Type`)
- ドキュメントコメントにはクエリ対象テーブルと結合テーブルを記載
- 日本語コメント可

### 2. 実装クラス
```php
<?php

namespace App\Repositories\Mobile\Player;

use App\Repositories\Mobile\Player\PlayerRepositoryInterface;
use App\Models\Roster;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;

class PlayerRepository extends BaseRepository implements PlayerRepositoryInterface
{
    public function queryRosterStarterInfo(int $season, int $team_id) : Collection
    {
        return $this->roster()->season($season)->team($team_id)
                     ->with(['team', 'player', 'position', 'rosterStarter'])
                     ->get();
    }
}
```

**ポイント:**
- `BaseRepository` を継承し、対応する `Interface` を実装
- モデルアクセスは `$this->modelName()` 形式
- スコープメソッドを活用 (`season()`, `team()`)
- `with()` でEagerLoading指定

### 3. BaseRepository活用
```php
// モデルアクセス
$this->player()     // Player model instance
$this->team()       // Team model instance
$this->roster()     // Roster model instance

// リポジトリアクセス
$this->userRepository()         // UserRepositoryInterface
$this->playerRepository()       // PlayerRepositoryInterface  
$this->adminPlayerRepository()  // Admin\PlayerRepositoryInterface
```

### 4. CRUD操作パターン
```php
// 取得系
// 全件取得
public function getAllPlayers() : Collection
{
    return $this->player()->orderBy('id', 'desc')->get();
}

// ページネーション付き取得
public function getPaginatedPlayers(int $perPage = 15) : LengthAwarePaginator
{
    return $this->player()->orderBy('id', 'desc')->paginate($perPage);
}

// 単一取得
public function getPlayerById(int $id) : ?Player
{
    return $this->player()->find($id);
}

// 操作系
// 新規作成(Eloquentのcreateメソッドを使用すること)
public function createPlayer(array $data) : Player
{
    return $this->player()->create($data);
}

// 更新(BaseRepositoryのupdateWithTapメソッドを使用すること)
public function updatePlayer(int $id, array $data) : Player
{
    return $this->updateWithTap(
        $this->player()->find('id', $id), 
        $data
    );
}

public function deletePlayer(int $id) : bool
{
    return $this->player()->where('id', $id)->delete();
}
```

### 5. 型指定・戻り値
- 引数: 明示的型指定必須 (`int $id`, `array $data`)
- 戻り値: 型宣言必須 (`: Collection`, `: ?Player`, `: bool`)
- Nullable型は `?Type` で表現

### 6. インポート順序
1. 基本Laravelクラス (`Illuminate\*`)
2. プロジェクトモデル (`App\Models\*`)  
3. プロジェクトリポジトリ (`App\Repositories\*`)
4. その他プロジェクトクラス

### 7. コメント・ドキュメンテーション
- メソッドの目的を日本語で記載
- DBアクセスパターンを記載 (`from:`, `join:`)
- 複雑なロジックには適切なコメントを追加

### 8. 名前空間とエイリアス
```php
use App\Repositories\Admin\Player\PlayerRepositoryInterface as AdminPlayerRepositoryInterface;
```
- 同名クラス使用時は `as` でエイリアス指定

## サービスコンテナ登録

新しいRepository InterfaceとClassを作成した場合は、必ず `AppServiceProvider.php` でDIコンテナに登録する。

### 登録パターン
```php
// app/Providers/AppServiceProvider.php の register() メソッド内

/************************************************
 *  リポジトリ層
 ************************************************/
// Mobile Repositories
$this->app->singleton(PlayerRepositoryInterface::class,     PlayerRepository::class);
$this->app->singleton(UserRepositoryInterface::class,       UserRepository::class);
$this->app->singleton(TeamRepositoryInterface::class,       TeamRepository::class);

// Admin Repositories (同名クラスの場合はエイリアス使用)
$this->app->singleton(AdminPlayerRepositoryInterface::class, AdminPlayerRepository::class);
```

### 重要な規約
- **必ずsingleton()で登録** - instance()やbind()は使わない
- **インターフェース => 実装クラスの順**で記述
- **Mobile/Admin で分けてコメントアウト**
- **エイリアスを使用している場合は適切にuse文で読み込み**

### use文の記載例
```php
// インターフェース
use App\Repositories\Mobile\Player\PlayerRepositoryInterface;
use App\Repositories\Admin\Player\PlayerRepositoryInterface as AdminPlayerRepositoryInterface;

// 実装クラス
use App\Repositories\Mobile\Player\PlayerRepository;
use App\Repositories\Admin\Player\PlayerRepository as AdminPlayerRepository;
```

## 設計思想
- Repository層では純粋なデータアクセスのみ
- ビジネスロジックはService層で処理
- インターフェースによる疎結合設計
- BaseRepositoryでモデルアクセスを共通化
- Mobile/Admin でコンテキストを分離
- すべてのRepositoryはDIコンテナでsingleton登録