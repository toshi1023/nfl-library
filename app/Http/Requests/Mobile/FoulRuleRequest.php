<?php

namespace App\Http\Requests\Mobile;

use App\Lib\Common;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class FoulRuleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     * 必要ないかもだが、一応削除せずに残しておく
     *
     * @return array
     */
    public function rules()
    {
        return [
            // ペナルティのリクエスト用バリデーションチェック
            'status_type'             => 'nullable|integer',
            'yard_info'               => 'nullable|integer'
        ];
    }

    /**
     * メッセージをカスタマイズ
     */
    public function messages()
    {
        return [
            "status_type.integer"    => "攻守ステータスの検索値が無効な値を設定されています",
            "yard_info.integer"      => "罰則ヤードの検索値が無効な値を設定されています"
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
