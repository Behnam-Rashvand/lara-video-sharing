<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    public function video(){
        return $this->belongsTo(Video::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function OwnerAvatar():Attribute
    {
        return (Attribute::make(get: fn()=> $this->user?->gravatar));
    }

    public function OwnerName():Attribute
    {
        return (Attribute::make(get: fn()=> $this->user?->name));
    }

    public function CreatedAtInHuman():Attribute
    {
        return (Attribute::make(get: fn()=> verta($this->created_at)->formatDifference()));
    }


}
