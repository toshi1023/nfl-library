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
            'season'                  => 'required|integer|digits:4|min:1900|max:2100',
            'team_id'                 => 'required|integer'
        ];
    }

    /**
     * 属性名をカスタマイズ
     */
    public function attributes()
    {
        return [
            'season' => 'シーズン',
            'team_id' => 'チーム',
        ];
    }

    /**
     * 独自バリデーションメッセージのみ定義
     */
    public function messages()
    {
        return [
            "season.digits"         => ":attribute は4桁で指定してください",
            "season.min"            => ":attribute は1900以上で指定してください",
            "season.max"            => ":attribute は2100以下で指定してください",
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
