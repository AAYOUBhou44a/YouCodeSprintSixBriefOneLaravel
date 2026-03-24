<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DashboardResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // 'this' représente ici l'objet (ou la collection) passé à la ressource
        return [
            'id' => $this->id,
            'title' => $this->title,
            'content' => $this->content,
            'created_at' => $this->created_at->format('d/m/Y'),
            'author' => [
                'name' => $this->user->name,
                'city' => $this->user->city,
            ],
            // On peut ajouter le nombre de réponses par question si besoin
            'responses_count' => $this->responses_count ?? 0,
        ];
    }
}
