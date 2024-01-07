<?php

namespace App\Models\Traits;

use App\Models\Like;
use App\Models\User;
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

    public function likedBy(User $user) 
    {
        return $this->likes()->create([
            'user_id'=> $user->id ,
            'vote' => '1'
        ]);
    }

    public function dislikedBy(User $user) {
        return $this->likes()->create([
            'user_id'=> $user->id ,
            'vote' => '-1'
        ]);
    }
}
