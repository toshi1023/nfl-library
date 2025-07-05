<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

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
            'message'  => $this->resource['error_messages'],
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
}
