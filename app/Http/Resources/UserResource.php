<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin \App\Models\User
 */
class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'username' => $this->username,
            'email' => $this->email,
            'profile_picture' => $this->profile_picture,
            'is_admin' => $this->when($request->user()->is_admin, $this->admin),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
