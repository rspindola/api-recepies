<?php

namespace App\Http\Resources\Recipe;

use Illuminate\Http\Resources\Json\JsonResource;

class RecipeResource extends JsonResource
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
            'description' => $this->description,
            'cooking_time' => $this->cooking_time,
            'portion' => $this->portion,
            'image' => $this->image_url,
            'preparing' => $this->preparing,
            'ingredients' => $this->ingredients,
            'slug' => $this->slug,
            'note' => $this->note,
            'created_at' => $this->created_at
        ];
    }
}
