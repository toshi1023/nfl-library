# Request Layer Code Conventions

このファイルは、RequestクラスのコーディングルールをClaudeに理解してもらうために作成しました。

## ディレクトリ構造 
```
app/Http/Requests/
├── Mobile/                          # モバイルAPI用
│   ├── LoginRequest.php
│   ├── PlayerRequest.php
│   └── FoulRuleRequest.php
└── Admin/                           # 管理画面用
    └── Player/
        ├── IndexRequest.php
        ├── StoreRequest.php
        └── UpdateRequest.php
```

## 基本構成

### 命名規則
- クラス名: `{Entity}Request` または `{Action}Request`
- 名前空間: `App\Http\Requests\{Context}\{Entity}`

### 必須メソッド
- `authorize()`: 認可制御の実装
- `rules()`: バリデーションルールの定義
- `attributes()`: フィールド名の日本語化
- `messages()`: カスタムバリデーションメッセージ
- `failedValidation()`: バリデーション失敗時のレスポンス制御

## 実装例

### 1. 基本例 
```php
<?php

namespace App\Http\Requests\Mobile;

use App\Lib\Common;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class LoginRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email'    => 'required|email',
            'password' => 'required'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $res = Common::setValidationJsonResponse($validator);
        throw new HttpResponseException($res);
    }
}
```

**ポイント:**
- `FormRequest` を継承
- 必要なuseステートメントを記述
- `authorize()` は基本的に `true` を返す
- `failedValidation()` でJSON形式のエラーレスポンスを生成

### 2. MobileのRequestクラス
```php
<?php

namespace App\Http\Requests\Mobile;

use App\Lib\Common;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class PlayerRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'season'  => 'required|integer|digits:4|min:1900|max:2100',
            'team_id' => 'required|integer'
        ];
    }

    public function attributes()
    {
        return [
            'season' => 'シーズン',
            'team_id' => 'チーム',
        ];
    }

    public function messages()
    {
        return [
            "season.digits" => ":attribute は4桁で入力してください",
            "season.min"    => ":attribute は1900年以降で入力してください",
            "season.max"    => ":attribute は2100年以下で入力してください",
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $res = Common::setValidationJsonResponse($validator);
        throw new HttpResponseException($res);
    }
}
```

**ポイント:**
- `attributes()` でフィールド名の日本語化
- `messages()` でカスタムバリデーションメッセージの定義
- `:attribute` プレースホルダーの使用
- 基本的なメッセージは `ja/validation.php` を使用

### 3. AdminのRequestクラス
```php
<?php

namespace App\Http\Requests\Admin\Player;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Lib\Common;

class StoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'birthday' => 'required|string|size:8|regex:/^\d{8}$/',
            'height' => 'nullable|numeric|min:0|max:999.9',
            'weight' => 'nullable|numeric|min:0|max:999.9',
            'college' => 'nullable|string|max:255',
            'drafted_year' => 'nullable|integer|min:1900|max:' . date('Y'),
            'image_file' => 'nullable|string|max:255',
        ];
    }

    public function attributes(): array
    {
        return [
            'firstname' => 'ファーストネーム',
            'lastname' => 'ラストネーム',
            'birthday' => '生年月日',
            'height' => '身長',
            'weight' => '体重',
            'college' => '大学',
            'drafted_year' => 'ドラフト年',
            'image_file' => '画像ファイル',
        ];
    }

    public function messages(): array
    {
        return [
            'birthday.size' => ':attribute は8桁で入力してください（例：19901225）',
            'birthday.regex' => ':attribute は数字のみで入力してください（例：19901225）',
            'height.max' => ':attribute は999.9以下で入力してください',
            'weight.max' => ':attribute は999.9以下で入力してください',
            'drafted_year.min' => ':attribute は1900年以降で入力してください',
            'drafted_year.max' => ':attribute は' . date('Y') . '年以下で入力してください',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $res = Common::setValidationJsonResponse($validator);
        throw new HttpResponseException($res);
    }
}
```

**ポイント:**
- 戻り値の型宣言: (`: bool`, `: array`)
- より詳細なバリデーションルールの使用
- カスタムメッセージは最小限に抑制
- 動的な値（現在年）の使用

### 4. よく使用するバリデーションルール

#### 基本的なルール
```php
// 必須項目
'field' => 'required'

// 文字列型
'name' => 'required|string|max:255'
'age' => 'required|integer|min:0|max:150'

// オプション項目
'description' => 'nullable|string|max:1000'

// メール認証
'email' => 'required|email|unique:users,email'
'password' => 'required|string|min:8|confirmed'
```

#### 特殊なルール
```php
// 生年月日
'birthday' => 'required|string|size:8|regex:/^\d{8}$/'

// 動的な年
'year' => 'required|integer|min:1900|max:' . date('Y')

// ページネーション
'per_page' => 'sometimes|integer|min:1|max:1000'

// 真偽値
'is_active' => 'required|boolean'
```

### 5. バリデーションメッセージの最適化

#### デフォルトメッセージ使用
```php
// Laravel標準メッセージを使用する場合
public function messages()
{
    return [
        'name.required' => '名前は必須です',
        'name.string' => '名前は文字列で入力してください',
        'name.max' => '名前は255文字以下で入力してください',
    ];
}

// より良いアプローチ
public function attributes()
{
    return [
        'name' => '名前',
    ];
}
// ja/validation.phpの基本メッセージを活用
```

#### カスタムメッセージの使用例
```php
public function messages()
{
    return [
        // 特殊な形式の場合のみカスタマイズ
        'birthday.size' => ':attribute は8桁で入力してください（例：19901225）',
        'birthday.regex' => ':attribute は数字のみで入力してください（例：19901225）',
        
        // 特殊な上限値の場合
        'height.max' => ':attribute は999.9以下で入力してください',
        
        // 動的な値を含む場合
        'year.max' => ':attribute は' . date('Y') . '年以下で入力してください',
    ];
}
```

## インポート順序
1. まずLaravelクラス (`Illuminate\*`)
2. 次にアプリケーション固有クラス (`App\Lib\*`)

## 重要事項
- すべてのRequestクラスはFormRequestを継承
- `authorize()` は基本的にtrueを返す（認可はMiddlewareで制御）
- バリデーションルールは厳密に定義すること
- カスタムメッセージはデフォルトメッセージと重複を避ける
- `attributes()` でフィールド名の日本語化
- `failedValidation()` でJSON形式のエラーレスポンス
- Mobile/Adminで用途を明確に分離
- 戻り値の型宣言を使用（Adminクラスで推奨）