<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Works extends Model
{
    use SoftDeletes;
    use HasSlug;

    protected $guarded = [];

    protected $dates = ['deleted_at'];

    protected $table = 'works';
    public function category()
    {
        return $this->belongsTo(Categories::class);
    }

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom(function ($model) {
                return Str::slug($model->title,'-'.'kn');
            })
            ->saveSlugsTo('slug');
    }
}
