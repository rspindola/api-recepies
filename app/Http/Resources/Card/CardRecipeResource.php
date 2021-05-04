<?php

namespace App\Http\Resources\Card;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Recipe\RecipeResource;

class CardRecipeResource extends JsonResource
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
            'user_id' => $this->user_id,
            'title' => $this->title,
            'description' => $this->description,
            'color' => $this->color,
            'created_at' => $this->created_at,
            'recipes' => RecipeResource::collection($this->whenLoaded('recipes')),
        ];
    }
}
