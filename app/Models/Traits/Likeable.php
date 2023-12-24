<?php

namespace App\Models\Traits;

use App\Models\Like;
use Illuminate\Database\Eloquent\Casts\Attribute;

trait Likeable
{



    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }

    public function likesCount(): Attribute
    {
        return (Attribute::make(
            fn () => $this->likes()
                ->where('vote', 1)
                ->count()
        ));
    }

    public function dislikesCount(): Attribute
    {
        return (Attribute::make(
            fn () => $this->likes()
            ->where('vote' , -1)
            ->count()
        ));
    }
}
