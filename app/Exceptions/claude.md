# Error Layer Code Conventions

このファイルは、例外クラスをスローする際のコーディングルールをClaudeに理解してもらうために作成しました。

### エラーケース
- データが見つからない場合
  - Eloquentのfindメソッドや、where句 + firstメソッドを使用してデータが見つからない場合(CollectionやLengthAwarePaginatorの場合は正常パターンに該当する)
- ファイルが見つからない場合
  - Storageクラス等のgetメソッドなどファイル取得を実行してデータが見つからない場合
- 認証に失敗した場合
- 引数が正しく設定されていない場合

### 対応表
- データが見つからない場合：ModelNotFoundExceptionクラスを使用
- ファイルが見つからない場合：FileNotFoundExceptionクラスを使用
- 認証に失敗した場合：AuthenticationExceptionクラスを使用
- 引数が正しく設定されていない場合：InvalidArgumentExceptionクラスを使用