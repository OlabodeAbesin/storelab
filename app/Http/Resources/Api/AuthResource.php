<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $permissions = [
            'create:product',
            'read:product',
            'update:product',
            'delete:product',
        ];

        return [
            'name' => $this->name,
            'email' => $this->email,
            'api_token' => $this->createToken('api', $permissions)->plainTextToken,
        ];
    }
}
