<?php

namespace App\Http\Resources\Recipe;

use App\Http\Resources\Category\CategoryResource;
use Illuminate\Http\Resources\Json\JsonResource;

class RecipeCategoryResource extends JsonResource
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
            'category' => new CategoryResource($this->category),
            'name' => $this->name,
            'description' => $this->description,
            'image' => $this->image_url,
            'cooking_time' => $this->cooking_time,
            'portion' => $this->portion,
            'preparing' => $this->preparing,
            'ingredients' => $this->ingredients,
            'note' => $this->note,
            'slug' => $this->slug,
            'created_at' => $this->created_at
        ];
    }
}
