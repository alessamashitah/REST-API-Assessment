<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'data' => [
                'user' => [
                    'name'  => $this->name,
                    'email' => $this->email,
                ]
            ]
        ];
    }

    public function with($request)
    {
        return [
            'success' => true,
            'message' => 'successful show user',
        ];
    }
}

