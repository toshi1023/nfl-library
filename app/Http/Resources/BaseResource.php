<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BaseResource extends JsonResource
{
    public function __construct(array $data)
    {
        parent::__construct($data);
    }

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  array  $data
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function successResponse(Request $request, array $data) : array
    {
        $method = $request->method();

        if(!array_key_exists('status', $data) || !$data['status']) $data['status'] = config('const.Success');
        if(!array_key_exists('message', $data) || !$data['message']) $data['message'][] = $this->getInitialMessage($method);
        
        return $data;
    }

    /**
     * 成功レスポンスでメッセージが設定されていない場合用の初期メッセージを取得する
     * @param string $method Http動詞 [get, post, put, delete, patch]
     */
    private function getInitialMessage(string $method)
    {
        switch(strtolower($method)) {
            case 'get':
                return 'データの取得に成功しました。';
            case 'post':
                return 'データの登録に成功しました。';
            case 'put':
                return 'データの更新に成功しました。';
            case 'delete':
                return 'データの削除に成功しました。';
            case 'patch':
                return 'データの復元に成功しました。';
            default:
                return '該当しないHttp動詞が渡されました。';
        }
    }
}
