<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Post extends Model
{
    use HasFactory;
    use HasSlug;

    protected $fillable = ['title', 'description', 'content', 'category_id', 'thumbnail'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function getImage()
    {
        if(!$this->thumbnail){
            return asset("admin/dist/img/noimage.jpg");
        }
        return asset("uploads/{$this->thumbnail}");
    }

    public function getDate()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->format('d.F, Y');
    }

}



