<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function videos()
    {
        return $this->hasMany(Video::class);
    }

    public function getRandomVideos( $curent_video_id ,$count = 6)
    {
        return $this->videos()
            ->whereNot('id', $curent_video_id )
            ->inRandomOrder()
            ->take($count)
            ->get();
    }
}
