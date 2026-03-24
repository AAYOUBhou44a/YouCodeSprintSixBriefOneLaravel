<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return
        [
            'id' => $this->id,
            'name' => $this->name,
            'role' => $this->role,
            'email' => $this->email,
            'city' => $this->city,
            'street' => $this->street,
            'nb_likes' => $this->likes->count(),
            'nb_questions' => $this->questions->count(),
            'created_at' => $this->created_at->format('d/m/Y'),
            'questions' => $this->questions,
        ];
    }
}
