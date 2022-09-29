<?php

namespace App\Http\Requests;

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
            'status_type'             => 'required',
            'yard_info'               => 'required'
        ];
    }

    /**
     * メッセージをカスタマイズ
     */
    public function messages()
    {
        return [
            "status_type.required"    => "攻守ステータスの検索値が設定されていません",
            "yard_info.required"      => "罰則ヤードの検索値が設定されていません"
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
