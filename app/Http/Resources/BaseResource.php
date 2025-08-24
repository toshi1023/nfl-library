<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Pagination\LengthAwarePaginator;

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
     * @param  array  $paginationInfo
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function successResponse(Request $request, array $data, array $paginationInfo = []) : array
    {
        $method = $request->method();

        // ページネーションを設定
        if(count($paginationInfo) > 0) {
            $data['pagination'] = $paginationInfo;
        }

        if(!array_key_exists('status', $data) || !$data['status']) $data['status'] = config('const.Success');
        if(!array_key_exists('message', $data) || !$data['message']) $data['message'][] = $this->getInitialMessage($method);
        
        return $data;
    }

    /**
     * レスポンスがページネーションされているかどうかをチェックする
     * @param mixed $dataList
     */
    public function checkPagination($dataList) : bool
    {
        return $dataList instanceof LengthAwarePaginator;
    }

    /**
     * ページネーション情報を取得する
     * @param LengthAwarePaginator $dataList
     */
    public function getPaginationInfo(LengthAwarePaginator $dataList) : array
    {
        return [
            'current_page' => $dataList->currentPage(),
            'per_page' => $dataList->perPage(),
            'total' => $dataList->total(),
            'last_page' => $dataList->lastPage(),
            'first_page_url' => $dataList->url(1),
            'last_page_url' => $dataList->url($dataList->lastPage()),
            'next_page_url' => $dataList->nextPageUrl(),
            'prev_page_url' => $dataList->previousPageUrl(),
            'path' => $dataList->path(),
            'from' => $dataList->firstItem(),
            'to' => $dataList->lastItem(),
        ];
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
