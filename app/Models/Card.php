<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Card extends Model
{
    use HasSlug;

    protected $fillable = [
        'title', 'description', 'color'
    ];

    protected $casts = [
        'created_at' => 'datetime:d/m/Y H:i',
        'updated_at' => 'datetime:d/m/Y H:i',
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    /**
     * Get all of favorite recipes for the user.
     */
    public function recipes()
    {
        return $this->belongsToMany(Recipe::class, 'card_recipe', 'card_id', 'recipe_id');
    }
}
