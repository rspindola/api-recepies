<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'description', 'icon', 'slug'];

    /**
     * Category hasMany Recipe
     */
    public function recipes()
    {
        return $this->hasMany(Recipe::class);
    }
}
