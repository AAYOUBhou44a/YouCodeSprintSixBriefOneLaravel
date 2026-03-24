<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class QuestionResource extends JsonResource
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
            'title' => $this->title,
            'content' => $this->content,
            'author' => $this->user->name,
            'city' => $this->city,
            'street' => $this->street,
            'likes' => $this->likes->count(),
            'created_at' => $this->created_at->format('d/m/Y'),
            'responses' => $this->responses->map(function($res){
                return [
                    'author' => $res->user->name,
                    'created_at' => $res->created_at->diffForHumans(),
                    'response' => $res->response
                ];
            }),
            'is_liked' => $this->likes->contains('user_id', auth()->id())
        ];
    }
}
