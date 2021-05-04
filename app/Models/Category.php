<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Category extends Model
{
    use HasSlug;

    protected $fillable = ['name', 'description', 'icon', 'slug'];

    protected $hidden = [
        'icon'
    ];

    protected $appends = [
        'image_url'
    ];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function getImageUrlAttribute()
    {
        return asset('storage/' . $this->attributes['icon']);
    }

    /**
     * Category hasMany Recipe
     */
    public function recipes()
    {
        return $this->hasMany(Recipe::class);
    }
}
