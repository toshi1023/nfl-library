<?php

namespace App\Http\Requests\Admin\Team;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Lib\Common;

class UpdateRequest extends FormRequest
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
            'team_name' => 'sometimes|required|string|max:255',
            'team_abbreviation' => 'sometimes|required|string|max:10',
            'team_location' => 'sometimes|required|string|max:255',
            'logo_image' => 'sometimes|nullable|string|max:255',
        ];
    }

    public function attributes(): array
    {
        return [
            'team_name' => 'チーム名',
            'team_abbreviation' => 'チーム略称',
            'team_location' => 'チーム所在地',
            'logo_image' => 'ロゴ画像',
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