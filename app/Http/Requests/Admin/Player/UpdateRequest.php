<?php

namespace App\Http\Requests\Admin\Player;

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
            'firstname' => 'sometimes|required|string|max:255',
            'lastname' => 'sometimes|required|string|max:255',
            'birthday' => 'sometimes|required|string|size:8|regex:/^\d{8}$/',
            'height' => 'nullable|numeric|min:0|max:999.9',
            'weight' => 'nullable|numeric|min:0|max:999.9',
            'college' => 'nullable|string|max:255',
            'drafted_team' => 'nullable|string|max:255',
            'drafted_round' => 'nullable|string|max:255',
            'drafted_rank' => 'nullable|string|max:255',
            'drafted_year' => 'nullable|integer|min:1900|max:' . date('Y'),
            'image_file' => 'nullable|string|max:255',
        ];
    }

    /**
     * バリデーターエラー用のカスタムエラーメッセージを取得する
     */
    public function attributes(): array
    {
        return [
            'firstname' => 'ファーストネーム',
            'lastname' => 'ラストネーム',
            'birthday' => '生年月日',
            'height' => '身長',
            'weight' => '体重',
            'college' => '大学名',
            'drafted_team' => 'ドラフトチーム',
            'drafted_round' => 'ドラフト巡回数',
            'drafted_rank' => 'ドラフト全体順位',
            'drafted_year' => 'ドラフト年',
            'image_file' => '画像ファイル名',
        ];
    }

    public function messages(): array
    {
        return [
            'birthday.size' => ':attribute は8文字で入力してください（例：19901225）',
            'birthday.regex' => ':attribute は数字のみで入力してください（例：19901225）',
            'height.max' => ':attribute は999.9以下で入力してください',
            'weight.max' => ':attribute は999.9以下で入力してください',
            'drafted_year.min' => ':attribute は1900年以降で入力してください',
            'drafted_year.max' => ':attribute は' . date('Y') . '年以前で入力してください',
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