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
        'description'
    ];

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
        return Video::all()->random($count);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
