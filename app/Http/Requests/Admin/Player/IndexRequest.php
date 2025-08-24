<?php

namespace App\Http\Requests\Admin\Player;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Lib\Common;

class IndexRequest extends FormRequest
{
    /**
     * ユーザーがこのリクエストを実行する権限があるかどうかを判断する
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * リクエストに適用するバリデーションルールを取得する
     */
    public function rules(): array
    {
        return [
            'is_all' => 'required|boolean',
            'per_page' => 'sometimes|integer|min:1|max:1000',
        ];
    }

    public function attributes()
    {
        return [
            'is_all' => '全件取得フラグ',
            'per_page' => '1ページあたりの件数',
        ];
    }

    /**
     * エラー内容をJson形式でリターン
     */
    protected function failedValidation(Validator $validator)
    {
        $res = Common::setValidationJsonResponse($validator);
        throw new HttpResponseException($res);
    }
}