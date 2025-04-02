<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Support\Str;
use voku\helper\ASCII;
class Categories extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $table = 'categories';

    public function works()
    {
        return $this->hasMany(Works::class);
    }

    public static function boot()
    {
        parent::boot();
    
        static::creating(function ($category) {
            if (empty($category->slug)) {
                $category->slug = $category->generateSlug($category->name);
            }
        });
    
        static::updating(function ($category) {
            $category->slug = $category->generateSlug($category->name);
        });
    }
    
    protected function generateSlug($title)
    {
        // Generate English slug
        $englishSlug = strtolower(preg_replace('/[^a-z0-9]+/', '-', trim($title)));
        $englishSlug = preg_replace('/-+/', '-', $englishSlug); // Remove multiple hyphens
    
        // Generate Kannada slug
        $kannadaSlug = preg_replace('/\s+/', '-', trim($title));
        $kannadaSlug = preg_replace('/[^ಅ-ಹಁ-ಃ0-9-]/u', '', $kannadaSlug);
        $kannadaSlug = preg_replace('/-+/', '-', $kannadaSlug); // Remove multiple hyphens
    
        // Merge both slugs with a separator
        $finalSlug = $englishSlug . '-' . $kannadaSlug;
    
        // Ensure uniqueness
        $originalSlug = $finalSlug;
        $count = 1;
    
        while (self::where('slug', $finalSlug)->exists()) {
            $finalSlug = $originalSlug . '-' . $count;
            $count++;
        }
    
        return $finalSlug;
    }

}
