<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;

class UpdatePlayerRequest extends FormRequest
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
    public function messages(): array
    {
        return [
            'firstname.required' => 'ファーストネームは必須です',
            'firstname.string' => 'ファーストネームは文字列で入力してください',
            'firstname.max' => 'ファーストネームは255文字以内で入力してください',
            'lastname.required' => 'ラストネームは必須です',
            'lastname.string' => 'ラストネームは文字列で入力してください',
            'lastname.max' => 'ラストネームは255文字以内で入力してください',
            'birthday.required' => '生年月日は必須です',
            'birthday.string' => '生年月日は文字列で入力してください',
            'birthday.size' => '生年月日は8文字で入力してください（例：19901225）',
            'birthday.regex' => '生年月日は数字のみで入力してください（例：19901225）',
            'height.numeric' => '身長は数値で入力してください',
            'height.min' => '身長は0以上で入力してください',
            'height.max' => '身長は999.9以下で入力してください',
            'weight.numeric' => '体重は数値で入力してください',
            'weight.min' => '体重は0以上で入力してください',
            'weight.max' => '体重は999.9以下で入力してください',
            'college.string' => '大学名は文字列で入力してください',
            'college.max' => '大学名は255文字以内で入力してください',
            'drafted_team.string' => 'ドラフトチームは文字列で入力してください',
            'drafted_team.max' => 'ドラフトチームは255文字以内で入力してください',
            'drafted_round.string' => 'ドラフト巡回数は文字列で入力してください',
            'drafted_round.max' => 'ドラフト巡回数は255文字以内で入力してください',
            'drafted_rank.string' => 'ドラフト全体順位は文字列で入力してください',
            'drafted_rank.max' => 'ドラフト全体順位は255文字以内で入力してください',
            'drafted_year.integer' => 'ドラフト年は整数で入力してください',
            'drafted_year.min' => 'ドラフト年は1900年以降で入力してください',
            'drafted_year.max' => 'ドラフト年は' . date('Y') . '年以前で入力してください',
            'image_file.string' => '画像ファイル名は文字列で入力してください',
            'image_file.max' => '画像ファイル名は255文字以内で入力してください',
        ];
    }

    /**
     * 失敗したバリデーション試行を処理する
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
                'error_messages' => $validator->errors()->all(),
                'status' => config('const.ValidationError', 'validation_error')
            ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY)
        );
    }
}