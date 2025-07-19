# 作業指示
- 管理画面でplayersテーブルに関するデータのCRUDができる機能を作ろうと思ってるから、そのためのCRUDに対応したAPIを実装して。

## 目的
- 管理画面側のplayersテーブルに関するデータの繋ぎ込みをしたい。

## 要件
1. Route::resource('/players', 'PlayerController'); で定義したルーティングのAPI処理を実装すること。
2. 構成はServiceクラスにビジネスロジック、Repositoryクラスにクエリロジックを記載すること。
3. バリデーションやResponseの構成はそれぞれカスタムのRequestクラス、Resourceクラスを作成してそこにロジックを記述すること。
4. 構成で記載したそれぞれのクラスはAdminフォルダを親に持ち、その中に集約すること。Adminフォルダがない場合は新規で作成すること。
5. 作成したAPIの処理に応じた成功パターンと失敗パターンのUnitテストとFeatureテストを生成すること。
6. 全部のUnitテストとFeatureテストをクリアすること。試験をクリアしない場合は

## 制約事項
- ServiceクラスとRepositoryクラスはinterfaceを実装すること。
- ResponseにはResourceクラスを使ってAPIを整形すること。(レスポンスはテーブルのカラムを全て返す形でOK。)
- ControllerのResponseはApp\Http\Controllers\Api\Mobile\SearchControllerを参考にして統一すること。
- クラスを作成する際はMobileフォルダに存在する既存のクラスを参照して、親クラスの継承やinterfaceの実装ルールに則ること。
- interfaceのサービスコンテナへの解決はAppServiceProviderクラスに記述すること。

## 追加指示
- playersテーブルの構造を事前に確認し、マイグレーションファイルまたはModelファイルを参照してカラム情報を把握すること。
- エラーハンドリングは適切に実装し、HTTPステータスコードとエラーメッセージを適切に返すこと。
- 各CRUDメソッド（index, show, store, update, destroy）の実装内容を明確にすること。
- DIコンテナでの依存性注入を適切に設定すること（ServiceProvider等）。
- APIのレスポンス形式を統一すること（成功時とエラー時の構造）。

## ファイル構成例
app/
├── Http/
│   ├── Controllers/
│   │   └── Api/
│   │       └── Admin/
│   │           └── PlayerController.php
│   ├── Requests/
│   │   └── Admin/
│   │       └── Player/
│   │           ├── StorePlayerRequest.php
│   │           └── UpdatePlayerRequest.php
│   └── Resources/
│       └── Admin/
│           └── Player/
│               └──PlayerResource.php
├── Services/
│   └── Admin/
│       └── Player/
│           ├── PlayerService.php
│           └── PlayerServiceInterface.php
├── Repositories/
│   └── Admin/
│       └── Player/
│           ├── PlayerRepository.php
│           └── PlayerRepositoryInterface.php
└── Providers/
│   └── AppServiceProvider.php
tests/
├── Feature/
│   └── Admin/
│       └── PlayerControllerTest.php
└── Unit/
    └── Admin/
            └── PlayerServiceTest.php

## 参考情報
- 既存のプロジェクト構造とコーディング規約に従うこと
- Laravelのベストプラクティスを遵守すること