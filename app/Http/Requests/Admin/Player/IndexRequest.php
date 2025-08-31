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

    public function validationData()
    {
        $params = $this->all();
        if(isset($params['is_all'])) {
            $params['is_all'] = $this->boolean('is_all');
        }
        return $params;
    }

    /**
     * リクエストに適用するバリデーションルールを取得する
     */
    public function rules(): array
    {
        return [
            'keyword' => 'sometimes|nullable|string|max:255',
            'drafted_year' => 'sometimes|nullable|integer|min:1900|max:' . date('Y'),
            'drafted_round' => 'sometimes|nullable|string|max:255',
            'is_all' => 'required|boolean',
            'per_page' => 'sometimes|integer|min:1|max:1000',
        ];
    }

    public function attributes()
    {
        return [
            'keyword' => 'キーワード',
            'drafted_year' => 'ドラフト年',
            'drafted_round' => 'ドラフト順',
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