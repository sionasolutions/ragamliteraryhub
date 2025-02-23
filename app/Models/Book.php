<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;   
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class book extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];
    protected $dates = ['deleted_at'];
    protected $table = 'books';

    use HasSlug;

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    protected $casts = [
        'date' => 'date', 
    ];
}
