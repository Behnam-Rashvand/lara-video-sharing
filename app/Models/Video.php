<?php

namespace App\Models;

use App\Models\Traits\Likeable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Video extends Model
{
    use HasFactory , Likeable;

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

    public function CreatedAt(): Attribute
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

    public function CategoryName():Attribute
    {
        return (Attribute::make(get: fn() => $this->category?->name ));
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function OwnerName(): Attribute
    {
        return (Attribute::make(get: fn()=> $this->user?->name));
    }

    public function OwnerAvatar(): Attribute
    {
        return (Attribute::make(get: fn()=> $this->user?->gravatar));
    }

    public function videoUrl(): Attribute
    {
        return (Attribute::make(get: fn()=> '/storage/'.$this->url));
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->orderByDesc('created_at');
    }

}
