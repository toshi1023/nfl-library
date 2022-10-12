<?php

namespace App\Http\Requests\Mobile;

use App\Lib\Common;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class PlayerRequest extends FormRequest
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
     *
     * @return array
     */
    public function rules()
    {
        return [
            // ロスター・スターター・フォーメーションのリクエスト用バリデーションチェック
            'season'                  => 'required',
            'team_id'                 => 'required'
        ];
    }

    /**
     * メッセージをカスタマイズ
     */
    public function messages()
    {
        return [
            "season.required"       => "シーズンの検索値が設定されていません",
            "team_id.required"      => "チームの検索値が設定されていません"
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
