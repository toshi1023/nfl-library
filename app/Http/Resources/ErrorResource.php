<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ErrorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $res = [
            'status' => $this->resource['status'],
            'message'  => $this->resource['message'],
        ];
        if(config('const.app_env') === 'local') {
            $res = array_merge($res, [
                'details' => [
                    'message'  => $this->resource['details']['message'],
                    'file'     => $this->resource['details']['file'],
                    'line'     => $this->resource['details']['line']
                ]
            ]);
        }
        return $res;
    }

    /**
     * レスポンスのステータスコードを指定
     * 
     * ※引数に型指定をすると親クラスのメソッドとシグネチャが異なるため、エラーとなる。
     *  そのため、引数の型指定はあえて外している。
     *
     * @param Request $request
     * @param JsonResponse $response
     * @return void
     */
    public function withResponse($request, $response)
    {
        $response->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}
