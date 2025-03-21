<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Support\Str;
use voku\helper\ASCII;
class Categories extends Model
{
    use HasFactory;
    use HasSlug;
    protected $guarded = [];

    protected $table = 'categories';

    public function works()
    {
        return $this->hasMany(Works::class);
    }

    public function getRouteKeyName()
    {
        return 'slug'; // Tells Laravel to use 'slug' instead of 'id' in route model binding
    }
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom(function($model) {
                $slug=ASCII::to_ascii($model->name);
                return Str::slug($slug,'-'.'kn');
            })
            ->saveSlugsTo('slug');
    }
}
