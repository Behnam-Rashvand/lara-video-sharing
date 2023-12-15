<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Video extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'url',
        'length',
        'slug',
        'thumbnail',
        'description' ,
        'category_id'
    ];

    protected $perPage= 18;

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function lengthInHuman(): Attribute
    {
        return Attribute::make(get: fn() => gmdate('H:i', $this->length));
    }

    public function createdAt(): Attribute
    {
        return Attribute::make(get: fn($value) => verta($value)->formatDifference());
    }

    public function relatedVideos($count = 6)   
    {
        return $this->category->getRandomVideos( $this->id , $count);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function categoryName():Attribute
    {
        return (Attribute::make(get: fn() => $this->category?->name ));
    }
}
