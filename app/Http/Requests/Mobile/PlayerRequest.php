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
        logger()->info($this->input('season'));
        return [
            // ロスター・スターター・フォーメーションのリクエスト用バリデーションチェック
            'season'                  => 'required|integer|digits:4|min:1900|max:2100',
            'team_id'                 => 'required|integer'
        ];
    }

    /**
     * メッセージをカスタマイズ
     */
    public function messages()
    {
        return [
            "season.required"       => "シーズンの検索値が設定されていません",
            "team_id.required"      => "チームの検索値が設定されていません",
            "season.integer"        => "シーズンの検索値は整数で指定してください",
            "team_id.integer"       => "チームの検索値は整数で指定してください",
            "season.max"            => "シーズンの検索値は2100以下で指定してください",
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
