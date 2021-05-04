<?php

namespace App\Http\Resources\User;

use App\Http\Resources\Recipe\RecipeResource;
use Illuminate\Http\Resources\Json\JsonResource;

class UserRecipeResource extends JsonResource
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
            'email' => $this->email,
            'gender' => $this->gender,
            'avatar' => $this->avatar,
            'phone' => $this->phone,
            'origin' => $this->origin,
            'status' => $this->status,
            'recipes' => RecipeResource::collection($this->whenLoaded('recipes'))
        ];
    }
}
