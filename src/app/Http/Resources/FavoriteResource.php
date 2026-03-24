<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FavoriteResource extends JsonResource
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
            'title' => $this->question->title,
            'created_at' => $this->question->created_at->diffForHumans(),
            'nb_responses' => $this->question->responses->count(),
            'question_id' => $this->question->id
        ];
    }
}
