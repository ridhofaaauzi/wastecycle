<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $user =  Auth::user();
        return [
            'user' => $this->whenLoaded('user'),
            'username' => $this->username,
            'email' => $this->email,
            'alamat' => $this->alamat,
            'created_at' => $this->created_at,
        ];
    }
}