# CLAUDE.md

このファイルは、このリポジトリでコードを扱う際のClaude Code (claude.ai/code)向けのガイダンスです。

## プロジェクト概要

これは、NFLプレイヤーデータと統計を管理するDockerizedされたLaravelアプリケーションです。プロジェクトは以下で構成されています：

**バックエンド（Laravel API）**：`server/backend/nfl-library-backend/`に配置
- Sanctum認証を使用したLaravel 8.xアプリケーション
- モバイルアプリと管理画面用のRESTful API
- プレイヤー、チーム、フォーメーション、統計データのMySQLデータベース
- Selenium WebDriverを使用したNFLロスターデータのWebスクレイピング機能

**Docker環境**：nginx、PHP-FPM、MySQL、Redis、Seleniumでコンテナ化

## よく使用する開発コマンド

### バックエンド（Laravel）
```bash
# バックエンドディレクトリに移動
cd server/backend/nfl-library-backend

# 依存関係のインストール
composer install

# データベース操作
php artisan migrate:fresh --seed

# テスト実行
./vendor/bin/phpunit

# データスクレイピングコマンド（注意して使用 - Seleniumが必要）
php artisan scrape:rosters {year}
php artisan csv:import {year}
php artisan scrape:starters {year}
php artisan make:tf {year}
```

### Docker操作
```bash
# 全サービス開始
docker-compose up -d

# 全サービス停止
docker-compose down

# ログ表示
docker-compose logs -f [service_name]
```

## アーキテクチャ概要

### バックエンド構造
- **リポジトリパターン**：`app/Repositories/`内のインターフェースを持つデータアクセス層
- **サービス層**：`app/Services/`内のビジネスロジック（MobileとAdmin名前空間で分離）
- **APIコントローラー**：`app/Http/Controllers/Api/`内のRESTfulエンドポイント
- **モデル**：データベースエンティティの`app/Models/`内のEloquentモデル
- **認証**：APIトークン認証用のLaravel Sanctum
- **テスト**：`tests/`内のPHPUnitテスト（FeatureテストとUnitテストスイート）
- **ファイル実装**：該当するクラスファイルを管轄するフォルダ直下にclaude.mdがある場合は、先にその内容を確認してルールに沿ったファイル作成を実施する

### 主要モデル
- `Player`：ポジションと統計を含むNFLプレイヤーデータ
- `Team`：ロゴ付きNFLチーム情報
- `Formation`：チームフォーメーションと戦略
- `Roster`：シーズンごとのプレイヤー-チーム関係
- `Starter`：スターティングラインナップ情報
- `FoulRule`：NFLルール違反とペナルティ

### APIエンドポイント
- 認証：`/api/auth/login`、`/api/auth/logout`
- プレイヤー：`/api/players/info`
- 検索：`/api/search/team/index`、`/api/search/season/index`
- 管理：`/api/admin/players`（リソースルート）

### データベース設定
- 本番DB：`nfl_library`
- テストDB：`nfl_library_test`
- UTF-8MB4文字セットでMySQL 5.7を使用

## 開発ノート

### Webスクレイピング
- NFLロスターデータスクレイピングにSelenium WebDriverを使用
- 本番環境でChromeDriverのセットアップが必要
- 外部ウェブサイトと相互作用するため、スクレイピングコマンドは注意深く使用する必要があります

### データインポートプロセス
1. CSVファイルを`storage/app/public/`に抽出
2. データベースマイグレーション実行：`php artisan migrate:fresh --seed`
3. スクレイピングコマンドを順次実行：
   - `php artisan scrape:rosters {year}`
   - `php artisan csv:import {year}`
   - `php artisan scrape:starters {year}`
   - `php artisan make:tf {year}`

### テスト
- `phpunit.xml`内のPHPUnit設定
- 分離されたテストデータベース（`nfl_library_test`）
- APIエンドポイント用のFeatureテスト
- サービス層用のUnitテスト

### 環境セットアップ
- ローカル開発にDocker Composeを使用
- サービス：PHP-FPM、Nginx、MySQL、Redis、Selenium
- PhpMyAdminはポート8080で利用可能
- アプリケーションはポート80（nginx）で動作